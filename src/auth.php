<?php

require_once __DIR__ . '/db.php';

session_start();

// Roles
define('ROLE_ADMIN', 'ADMIN');
define('ROLE_RESP_BENEVOLE', 'RESP_BENEVOLE');
define('ROLE_RESP_PARTENAIRE', 'RESP_PARTENAIRE');
define('ROLE_RESP_EVENEMENT', 'RESP_EVENEMENT');
define('ROLE_BUREAU', 'BUREAU'); // Kept for legacy/other uses
define('ROLE_POLE', 'POLE'); // Kept for backward compatibility

/**
 * Attempt to log in a user.
 * 
 * @param string $email
 * @param string $password
 * @return bool True if successful, false otherwise.
 */
function login(string $email, string $password): bool
{
    $pdo = getPDO();

    // Fetch user by email
    $stmt = $pdo->prepare("SELECT id, password_hash, role, is_active FROM users WHERE email = :email LIMIT 1");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch();

    $success = false;

    if ($user && $user['is_active']) {
        if (password_verify($password, $user['password_hash'])) {
            // Password correct
            session_regenerate_id(true); // Prevent session fixation
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $user['role'];
            $_SESSION['user_email'] = $email; // Optional, useful for UI
            $success = true;
        }
    }

    // Log the attempt
    // Note: If user not found, we record NULL for user_id, or we could look up ID separately if we wanted strictly to track 'who tried'. 
    // But simplified here: if login successful, we have ID. If failed, and user existed, we have ID. 
    // If user didn't exist, we can't log user_id easily without a second query or re-using the fetched data.
    // Let's log user_id if we found the user, otherwise NULL.
    $userIdToLog = $user ? $user['id'] : null;
    $ip = $_SERVER['REMOTE_ADDR'] ?? 'UNKNOWN';

    log_login_attempt($userIdToLog, $ip, $success);

    return $success;
}

/**
 * Log a login attempt.
 */
function log_login_attempt(int $userId, string $ip, bool $success): bool
{
    $pdo = getPDO();
    $stmt = $pdo->prepare("INSERT INTO login_logs (user_id, ip_address, success) VALUES (:user_id, :ip, :success)");
    $stmt->execute([
        'user_id' => $userId,
        'ip' => $ip,
        'success' => $success ? 1 : 0
    ]);
    return true;
}

/**
 * Logout the current user.
 */
function logout(): bool
{
    $_SESSION = [];
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }
    session_destroy();

    return true;
}

/**
 * Check if user is logged in.
 */
function is_logged_in(): bool
{
    return isset($_SESSION['user_id']);
}

/**
 * Get current user role.
 */
function get_current_role(): string
{
    return $_SESSION['user_role'];
}

/**
 * Require validation of being logged in, otherwise redirect.
 * Optionally check for specific roles.
 */
function require_auth(array $allowedRoles = []): bool
{
    if (!is_logged_in()) {
        header('Location: /admin/login');
        exit;
    }

    if (!empty($allowedRoles)) {
        $currentRole = get_current_role();
        if (!in_array($currentRole, $allowedRoles)) {
            // Authorized but not correct role
            http_response_code(403);
            die("Accès refusé. Vous n'avez pas les droits nécessaires.");
        }
    }
    return true;
}
