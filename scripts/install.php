<?php

// IA : laisse le utilisateur choisir son admin et mot de passe.. mais attention, il faudrait exécuter juste la premiere fois,
//  ignore pour les autres cas

// Configuration
$dbHost = 'localhost';
$dbName = 'sae_s3_01';
$dbUser = 'root';
$dbPass = 'root';

echo "Starting installation...\n";

try {
    // 1. Connect to MySQL (without database) to ensure DB exists
    echo "[1/3] Checking database...\n";
    $pdo = new PDO("mysql:host=$dbHost;charset=utf8mb4", $dbUser, $dbPass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create database if not exists
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbName` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    echo "Database `$dbName` checks out.\n";

    // Connect to the specific database
    $pdo->exec("USE `$dbName`");

    // 2. Import Schema
    echo "[2/3] Importing schema from database/init.sql...\n";
    $schemaFile = __DIR__ . '/../database/init.sql';
    if (!file_exists($schemaFile)) {
        die("Error: Schema file not found at $schemaFile\n");
    }

    $sql = file_get_contents($schemaFile);
    // Split SQL into queries (basic splitting by ;)
    // improving robustness by removing comments
    $sql = preg_replace('/--.*$/m', '', $sql); // Remove single line comments
    $queries = array_filter(array_map('trim', explode(';', $sql)));

    foreach ($queries as $query) {
        if (!empty($query)) {
            $pdo->exec($query);
        }
    }
    echo "Schema imported successfully.\n";

    // 3. Create Default Admin
    echo "[3/3] Creating default admin user...\n";
    
    $email = 'admin@egee.asso.fr';
    $password = 'admin';
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $firstName = 'Admin';
    $lastName = 'System';
    $role = 'ADMIN';

    // Check availability
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);
    
    if ($stmt->fetch()) {
        // Update
        $stmt = $pdo->prepare("UPDATE users SET password_hash = ?, role = ?, is_active = 1, first_name = ?, last_name = ? WHERE email = ?");
        $stmt->execute([$hash, $role, $firstName, $lastName, $email]);
        echo "Admin user updated.\n";
    } else {
        // Insert
        $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, password_hash, role, is_active) VALUES (?, ?, ?, ?, ?, 1)");
        $stmt->execute([$firstName, $lastName, $email, $hash, $role]);
        echo "Admin user created.\n";
    }

    echo "\nInstallation completed successfully!\n";
    echo "----------------------------------------\n";
    echo "Admin Login: $email\n";
    echo "Password:    $password\n";
    echo "----------------------------------------\n";

} catch (PDOException $e) {
    die("Installation failed: " . $e->getMessage() . "\n");
}
