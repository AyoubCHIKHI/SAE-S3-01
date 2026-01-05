<?php

require_once __DIR__ . '/../src/db.php';

$pdo = getPDO();

$email = 'admin@egee.asso.fr';
$password = 'password123';
$firstName = 'Admin';
$lastName = 'System';
$role = 'ADMIN';

// Check if user exists
$stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email");
$stmt->execute(['email' => $email]);
$user = $stmt->fetch();

if ($user) {
    echo "L'utilisateur admin existe déjà.\n";
} else {
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    
    $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, password_hash, role, is_active) VALUES (:first_name, :last_name, :email, :password_hash, :role, 1)");
    $stmt->execute([
        'first_name' => $firstName,
        'last_name' => $lastName,
        'email' => $email,
        'password_hash' => $passwordHash,
        'role' => $role
    ]);
    
    echo "Utilisateur admin créé avec succès.\n";
    echo "Email: $email\n";
    echo "Mot de passe: $password\n";
}
