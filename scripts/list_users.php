<?php
require_once __DIR__ . '/../src/db.php';

$pdo = getPDO();
$stmt = $pdo->query("SELECT id, first_name, last_name, email, role FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (empty($users)) {
    echo "Aucun utilisateur trouvé.\n";
} else {
    foreach ($users as $user) {
        echo "ID: {$user['id']} | {$user['first_name']} {$user['last_name']} | Email: {$user['email']} | Role: {$user['role']}\n";
    }
}
