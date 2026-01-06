<?php
require_once __DIR__ . '/app/Config/Database.php';

$config = require __DIR__ . '/app/Config/Database.php';
$dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";
try {
    $pdo = new PDO($dsn, $config['user'], $config['password']);
    $stmt = $pdo->query("DESCRIBE users");
    $columns = $stmt->fetchAll(PDO::FETCH_ASSOC);
    print_r($columns);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
