<?php
require_once __DIR__ . '/app/Config/Database.php';

$config = require __DIR__ . '/app/Config/Database.php';
$dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";

try {
    $pdo = new PDO($dsn, $config['user'], $config['password']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 1. Création de la table registration_requests
    echo "Création de la table registration_requests...\n";
    $sqlCreate = "CREATE TABLE IF NOT EXISTS registration_requests (
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(255) NOT NULL,
        password_hash VARCHAR(255) NOT NULL,
        nom VARCHAR(100) NOT NULL,
        prenom VARCHAR(100) NOT NULL,
        role ENUM('ADMIN', 'BUREAU', 'POLE', 'BENEVOLE', 'BENEFICIAIRE') NOT NULL,
        profession VARCHAR(255),
        message TEXT,
        status ENUM('pending', 'validated', 'refused') DEFAULT 'pending',
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
    $pdo->exec($sqlCreate);
    echo "Table registration_requests créée.\n";

    // 2. Modification de la table users (ajout profession)
    echo "Vérification de la colonne 'profession' dans users...\n";
    $stmt = $pdo->query("SHOW COLUMNS FROM users LIKE 'profession'");
    if ($stmt->rowCount() == 0) {
        $pdo->exec("ALTER TABLE users ADD COLUMN profession VARCHAR(255) AFTER last_name");
        echo "Colonne 'profession' ajoutée à users.\n";
    } else {
        echo "Colonne 'profession' déjà présente.\n";
    }

    // 3. Modification de la table users (update ENUM role)
    // Note: On met à jour l'ENUM pour inclure les nouveaux rôles, même si on ne crée pas de compte bénévole pour l'instant, c'est plus sûr.
    // Et on s'assure que ADMIN, BUREAU, POLE sont bien là.
    echo "Mise à jour de la colonne 'role' dans users...\n";
    $pdo->exec("ALTER TABLE users MODIFY COLUMN role ENUM('ADMIN', 'BUREAU', 'POLE', 'BENEVOLE', 'BENEFICIAIRE') NOT NULL");
    echo "Colonne 'role' mise à jour.\n";

    echo "Migration terminée avec succès !\n";

} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage() . "\n";
    exit(1);
}
