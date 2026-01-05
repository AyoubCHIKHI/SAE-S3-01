<?php

require_once __DIR__ . '/../src/db.php';
require_once __DIR__ . '/../src/auth.php';

$pdo = getPDO();

$users = [
    [
        'first_name' => 'Responsable',
        'last_name' => 'Benevoles',
        'email' => 'responsable.benevole@egee.asso.fr',
        'password' => 'password123',
        'role' => ROLE_RESP_BENEVOLE
    ],
    [
        'first_name' => 'Responsable',
        'last_name' => 'Partenaires',
        'email' => 'responsable.partenaire@egee.asso.fr',
        'password' => 'password123',
        'role' => ROLE_RESP_PARTENAIRE
    ],
    [
        'first_name' => 'Responsable',
        'last_name' => 'Evenements',
        'email' => 'responsable.evenement@egee.asso.fr',
        'password' => 'password123',
        'role' => ROLE_RESP_EVENEMENT
    ]
];

foreach ($users as $userData) {
    // Check if user exists
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email");
    $stmt->execute(['email' => $userData['email']]);
    $existing = $stmt->fetch();

    if ($existing) {
        echo "L'utilisateur {$userData['email']} existe déjà. Mise à jour du rôle.\n";
        $stmt = $pdo->prepare("UPDATE users SET role = :role WHERE id = :id");
        $stmt->execute(['role' => $userData['role'], 'id' => $existing['id']]);
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
