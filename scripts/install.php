<?php

// scripts/install.php
// Installation : Base de données -> Admin -> Données de test

$startTime = microtime(true);
echo "Début de l'installation...\n\n";

// --- 1. Connexion & Création de la BDD ---

$config = require __DIR__ . '/../app/Config/Database.php';
$host = $config['host'];
$dbname = $config['dbname'];
$user = $config['user'];
$pass = $config['password'];

try {
    $pdo = new PDO("mysql:host=$host;charset=utf8mb4", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    echo "[BDD] Création de la base '$dbname' si nécessaire... ";
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbname` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    $pdo->exec("USE `$dbname`");
    echo "OK.\n";

    // --- 2. Import du Schéma ---

    echo "[BDD] Importation du schéma... ";
    $sqlFile = __DIR__ . '/../database/init.sql';
    if (!file_exists($sqlFile)) die("Erreur : init.sql manquant.\n");

    $sql = preg_replace('/--.*$/m', '', file_get_contents($sqlFile));
    $statements = array_filter(array_map('trim', explode(';', $sql)));

    foreach ($statements as $stmt) {
        if (!empty($stmt)) $pdo->exec($stmt);
    }
    echo "OK.\n";

    // --- 3. Compte Admin ---

    echo "[Utilisateur] Vérification du compte Admin... ";
    $email = 'admin@egee.asso.fr';
    
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    if (!$stmt->fetch()) {
        $hash = password_hash('admin', PASSWORD_DEFAULT);
        $pdo->prepare("INSERT INTO users (first_name, last_name, email, password_hash, role, is_active) VALUES (?, ?, ?, ?, ?, 1)")
            ->execute(['Admin', 'System', $email, $hash, 'ADMIN']);
        echo "Créé (admin/admin).\n";
    } else {
        echo "Existe.\n";
    }

    // --- 4. Données de Test ---

    echo "[Données] Articles... ";
    
    // Chargement manuel des dépendances Core si nécessaire
    if (file_exists(__DIR__ . '/../app/Core/Database.php')) require_once __DIR__ . '/../app/Core/Database.php';
    if (file_exists(__DIR__ . '/../app/Core/Model.php')) require_once __DIR__ . '/../app/Core/Model.php';
    require_once __DIR__ . '/../app/Models/Article.php';

    // Récupération de l'ID Admin
    $adminId = $pdo->query("SELECT id FROM users WHERE role = 'ADMIN' LIMIT 1")->fetchColumn();

    if ($adminId) {
        $articleModel = new \App\Models\Article();
        $articles = [
            ['Monswiller se prépare face aux crues !', 'Une initiative locale soutenue par EGEE.', '/assets/img/actualites/MOnswiller-614x460.png', 'Partenariat'],
            ['Transmettre, accompagner, s’engager ensemble', 'Nos bénévoles partagent leur expérience.', '/assets/img/actualites/BTransmettre-accompagner-368x460-1.png', 'Benevolat'],
            ['Préparer les jeunes', 'Interventions dans les lycées et universités.', '/assets/img/actualites/travail_en_mutation.jpg', 'Education']
        ];

        foreach ($articles as $art) {
            $exists = $pdo->prepare("SELECT 1 FROM articles WHERE title = ?");
            $exists->execute([$art[0]]);
            if (!$exists->fetch()) {
                if (method_exists($articleModel, 'create')) {
                    $articleModel->create([
                        'title' => $art[0], 
                        'content' => $art[1], 
                        'image_url' => $art[2], 
                        'category' => $art[3], 
                        'author_id' => $adminId
                    ]);
                }
            }
        }
        echo "OK.\n";
    } else {
        echo "Ignoré (Pas d'Admin).\n";
    }

    echo "[Données] Villes... ";
    // France
    $pdo->exec("INSERT IGNORE INTO Pays (id_pays, nom_pays) VALUES ('FR', 'France')");

    $cities = [
        'PARIS' => 'Paris', 'LYON' => 'Lyon', 'MARSEILLE' => 'Marseille',
        'TOULOUSE' => 'Toulouse', 'NICE' => 'Nice', 'NANTES' => 'Nantes',
        'STRASBOURG' => 'Strasbourg', 'BORDEAUX' => 'Bordeaux',
        'LILLE' => 'Lille', 'MONTPELLIER' => 'Montpellier'
    ];

    $cityStmt = $pdo->prepare("INSERT IGNORE INTO Ville (id_ville, nom_ville, id_pays) VALUES (?, ?, 'FR')");
    foreach ($cities as $id => $name) {
        $cityStmt->execute([$id, $name]);
    }
    echo "OK.\n";

    echo "\nInstallation terminée avec succès.\n";

} catch (Exception $e) {
    die("\nErreur : " . $e->getMessage() . "\n");
}
