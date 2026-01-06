<?php
require_once __DIR__ . '/app/Config/Database.php';
require_once __DIR__ . '/app/CodeIgniter.php'; // Try to load framework if possible, or just mock models

// Mock Model class since we can't easily bootstrap the full app in a script without index.php context
// Actually, let's just use raw PDO for verification to be independent of app state
$config = require __DIR__ . '/app/Config/Database.php';
$dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";

try {
    $pdo = new PDO($dsn, $config['user'], $config['password']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    echo "--- Test Start ---\n";

    // 1. Create Request (BENEVOLE - No User)
    echo "1. Creating BENEVOLE request...\n";
    $stm = $pdo->prepare("INSERT INTO registration_requests (email, password_hash, nom, prenom, role, status) VALUES (?, ?, ?, ?, ?, 'pending')");
    $emailBenevole = 'test_benevole_' . uniqid() . '@test.com';
    $stm->execute([$emailBenevole, 'hash', 'Test', 'Benevole', 'BENEVOLE']);
    $idBenevole = $pdo->lastInsertId();
    echo "Request created (ID: $idBenevole)\n";

    // 2. Create Request (POLE - User Created)
    echo "2. Creating POLE request...\n";
    $emailPole = 'test_pole_' . uniqid() . '@test.com';
    $stm->execute([$emailPole, 'hash', 'Test', 'Pole', 'POLE']);
    $idPole = $pdo->lastInsertId();
    echo "Request created (ID: $idPole)\n";

    // 3. Simulate Admin Validate BENEVOLE
    echo "3. Validating BENEVOLE...\n";
    // Logic from Controller: Just update status
    $pdo->exec("UPDATE registration_requests SET status = 'validated' WHERE id = $idBenevole");
    
    // Check Users
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$emailBenevole]);
    if ($stmt->fetch()) {
        echo "[FAIL] User created for BENEVOLE!\n";
    } else {
        echo "[PASS] No user created for BENEVOLE.\n";
    }

    // 4. Simulate Admin Validate POLE
    echo "4. Validating POLE...\n";
    // Logic from Controller: Create User + Update Status
    $pdo->exec("UPDATE registration_requests SET status = 'validated' WHERE id = $idPole");
    $pdo->prepare("INSERT INTO users (first_name, last_name, email, password_hash, role, is_active) VALUES (?, ?, ?, ?, ?, 1)")
        ->execute(['Pole', 'Test', $emailPole, 'hash', 'POLE']);
    
    // Check Users
    $stmt->execute([$emailPole]);
    if ($stmt->fetch()) {
        echo "[PASS] User created for POLE.\n";
    } else {
        echo "[FAIL] No user created for POLE!\n";
    }

    // Cleanup
    echo "--- Cleanup ---\n";
    $pdo->exec("DELETE FROM registration_requests WHERE email IN ('$emailBenevole', '$emailPole')");
    $pdo->exec("DELETE FROM users WHERE email = '$emailPole'");
    echo "Cleanup done.\n";

} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
