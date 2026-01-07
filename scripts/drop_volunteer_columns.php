<?php
// scripts/drop_volunteer_columns.php

$config = require __DIR__ . '/../app/Config/Database.php';
$host = $config['host'];
$dbname = $config['dbname'];
$user = $config['user'];
$pass = $config['password'];

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);

    echo "Dropping unused columns from 'volunteers' table...\n";

    $columns = ['physical_limitations', 'past_missions', 'availability'];
    
    foreach ($columns as $col) {
        try {
            $pdo->exec("ALTER TABLE volunteers DROP COLUMN `$col`");
            echo "Dropped '$col'.\n";
        } catch (PDOException $e) {
            // Error 1091: Can't DROP '...'; check that column/key exists
            if ($e->errorInfo[1] == 1091) {
                echo "Column '$col' does not exist (skipping).\n";
            } else {
                echo "Error dropping '$col': " . $e->getMessage() . "\n";
            }
        }
    }

    echo "Done.\n";

} catch (Exception $e) {
    die("Error: " . $e->getMessage() . "\n");
}
