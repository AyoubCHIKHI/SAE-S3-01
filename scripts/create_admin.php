<?php
require_once __DIR__ . '/../src/db.php';

try {
    $pdo = getPDO();

    $email = 'admin@egee.asso.fr';
    $password = 'admin'; // Change this in production!
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $firstName = 'Admin';
    $lastName = 'System';
    $role = 'ADMIN';

    // Check if user exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $existingUser = $stmt->fetch();

    if ($existingUser) {
        // Update existing admin
        $stmt = $pdo->prepare("UPDATE users SET password_hash = ?, role = ?, is_active = 1, first_name = ?, last_name = ? WHERE email = ?");
        $stmt->execute([$hash, $role, $firstName, $lastName, $email]);
        echo "User '$email' already exists. Password reset to '$password'.\n";
    } else {
        // Create new admin
        $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, password_hash, role, is_active) VALUES (?, ?, ?, ?, ?, 1)");
        $stmt->execute([$firstName, $lastName, $email, $hash, $role]);
        echo "User '$email' created successfully with password '$password'.\n";
    }

} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
