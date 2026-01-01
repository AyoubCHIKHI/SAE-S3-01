<?php


function getPDO(): PDO
{
    static $pdo = null;

    if ($pdo === null) {
        $host = 'localhost';
        $db   = 'sae_s3_01';
        $user = 'root';
        $pass = 'root'; // Password set by user. Change to '' if using default XAMPP/WAMP.

        try {
            $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4", $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }

    return $pdo;
}
