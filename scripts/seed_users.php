<?php

require_once __DIR__ . '/../src/db.php';

$pdo = getPDO();

$users = [
    [
        'first_name' => 'Admin',
        'last_name' => 'System',
        'email' => 'admin@egee.asso.fr',
        'password' => 'password123',
        'role' => 'ADMIN'
    ],
    [
        'first_name' => 'Responsable',
        'last_name' => 'Education',
        'email' => 'education@egee.asso.fr',
        'password' => 'password123',
        'role' => 'POLE' // Assuming POLE is the role for department heads
    ],
    [
        'first_name' => 'Responsable',
        'last_name' => 'Entreprise',
        'email' => 'entreprise@egee.asso.fr',
        'password' => 'password123',
        'role' => 'POLE'
    ],
    [
        'first_name' => 'Membre',
        'last_name' => 'Bureau',
        'email' => 'bureau@egee.asso.fr',
        'password' => 'password123',
        'role' => 'BUREAU'
    ]
];

foreach ($users as $userData) {
    // Check if user exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email");
    $stmt->execute(['email' => $userData['email']]);
    $existing = $stmt->fetch();

    if ($existing) {
        echo "L'utilisateur {$userData['email']} existe déjà.\n";
    } else {
        $passwordHash = password_hash($userData['password'], PASSWORD_DEFAULT);

        $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, password_hash, role, is_active) VALUES (:first_name, :last_name, :email, :password_hash, :role, 1)");
        $stmt->execute([
            'first_name' => $userData['first_name'],
            'last_name' => $userData['last_name'],
            'email' => $userData['email'],
            'password_hash' => $passwordHash,
            'role' => $userData['role']
        ]);

        echo "Utilisateur {$userData['role']} créé : {$userData['email']} / {$userData['password']}\n";
    }
}
