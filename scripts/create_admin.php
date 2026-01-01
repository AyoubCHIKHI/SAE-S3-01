<?php
// Script to create the initial admin user

require_once __DIR__ . '/../src/db.php';
require_once __DIR__ . '/../src/auth.php'; // For constants if needed, though we can hardcode for script

$pdo = getPDO();

$email = 'admin@egee.asso.fr';
$password = 'admin123'; // CHANGE THIS IMMEDIATELY AFTER LOGGING IN
$firstName = 'Admin';
$lastName = 'System';
$role = 'ADMIN';

echo "Attempting to create admin user...\n";
echo "Email: $email\n";
echo "Password: $password\n";

// Check if exists
$stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
$stmt->execute([$email]);
if ($stmt->fetch()) {
    die("Error: User with this email already exists.\n");
}

$hash = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (first_name, last_name, email, password_hash, role, is_active) 
        VALUES (:first_name, :last_name, :email, :password_hash, :role, 1)";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'first_name' => $firstName,
        'last_name' => $lastName,
        'email' => $email,
        'password_hash' => $hash,
        'role' => $role
    ]);
    echo "Success! Admin user created.\n";
    echo "--------------------------\n";
    echo "Go to /admin/login to sign in.\n";
} catch (PDOException $e) {
    die("Error creating user: " . $e->getMessage() . "\n");
}
