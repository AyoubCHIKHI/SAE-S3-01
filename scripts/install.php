<?php

// install.php - Single Installation Script
// usage: php scripts/install.php

echo "========================================\n";
echo "      EGEE - Installation Script\n";
echo "========================================\n\n";

// 1. Load Configuration or Prompt
$configFile = __DIR__ . '/../app/Config/database.php';
$config = [];

if (file_exists($configFile)) {
    echo "[INFO] Loading configuration from app/Config/database.php...\n";
    $config = require $configFile;
} else {
    // If config doesn't exist, we could prompt here, but for now we'll fail or use defaults if strict.
    // Given the task, we assume the config file I just created is the source of truth.
    die("[ERROR] Configuration file app/Config/database.php not found. Please create it first.\n");
}

$host = $config['host'];
$user = $config['user'];
$pass = $config['password'];
$dbname = $config['dbname'];

try {
    // 2. Connect to MySQL (no DB selected yet)
    echo "[STEP 1/4] Connecting to Database Server...\n";
    $pdo = new PDO("mysql:host=$host;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // 3. Create Database
    echo "[STEP 2/4] Creating Database `$dbname`...\n";
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbname` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    $pdo->exec("USE `$dbname`");
    echo "Database initialized.\n";

    // 4. Import Schema
    echo "[STEP 3/4] Importing Schema...\n";
    $schemaFile = __DIR__ . '/../database/init.sql';
    if (!file_exists($schemaFile)) {
        die("[ERROR] Schema file database/init.sql not found.\n");
    }

    $sql = file_get_contents($schemaFile);
    // Remove comments to avoid issues with some drivers/parsers
    $sql = preg_replace('/--.*$/m', '', $sql);
    
    // Split by semicolon (basic)
    $statements = array_filter(array_map('trim', explode(';', $sql)));

    foreach ($statements as $stmt) {
        if (!empty($stmt)) {
            $pdo->exec($stmt);
        }
    }
    echo "Schema imported successfully.\n";

    // 5. Create/Update Admin User
    echo "[STEP 4/4] Creating Admin User...\n";
    
    // Prompt for admin credentials if running interactively, otherwise use defaults
    // Since we are running in an agent, we will use defaults but check for environment vars 
    // or just hardcoded safe defaults for dev environment.
    
    $adminEmail = 'admin@egee.asso.fr';
    $first_name = 'Admin';
    $last_name = 'System';
    
    // Interactive check (simplified for this context)
    if (php_sapi_name() === 'cli' && defined('STDIN')) {
        echo "Enter Admin Email [$adminEmail]: ";
        $input = trim(fgets(STDIN));
        if (!empty($input)) $adminEmail = $input;
    }

    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$adminEmail]);
    $existingUser = $stmt->fetch();

    if ($existingUser) {
        echo "Admin user ($adminEmail) already exists.\n";
        echo "Do you want to reset the password? (y/n) [n]: ";
        $reset = trim(fgets(STDIN));
        if (strtolower($reset) === 'y') {
             echo "Enter New Password: ";
             $password = trim(fgets(STDIN));
             if (empty($password)) {
                 die("Password cannot be empty.\n");
             }
             $hash = password_hash($password, PASSWORD_DEFAULT);
             $pdo->prepare("UPDATE users SET password_hash = ? WHERE id = ?")->execute([$hash, $existingUser['id']]);
             echo "Password updated.\n";
        }
    } else {
        echo "Creating new admin user ($adminEmail)...\n";
        echo "Enter Password [admin]: ";
        $password = trim(fgets(STDIN));
        if (empty($password)) $password = 'admin'; // Default

        $hash = password_hash($password, PASSWORD_DEFAULT);
        $role = 'ADMIN';
        
        $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, password_hash, role, is_active) VALUES (?, ?, ?, ?, ?, 1)");
        $stmt->execute([$first_name, $last_name, $adminEmail, $hash, $role]);
        echo "Admin user created.\n";
        echo "Credentials: $adminEmail / (hidden)\n";
    }

    echo "\n========================================\n";
    echo "   Installation Completed Successfully  \n";
    echo "========================================\n";

} catch (PDOException $e) {
    die("[ERROR] Database Error: " . $e->getMessage() . "\n");
} catch (Exception $e) {
    die("[ERROR] " . $e->getMessage() . "\n");
}
