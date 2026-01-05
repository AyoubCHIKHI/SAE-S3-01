<?php
// Since SQLite doesn't support modifying ENUM columns easily (and they are just check constraints usually), 
// and MySQL handles it differently, this script attempts to run a query to update strict types if using MySQL.
// For SQLite, it often just works unless there's a strict CHECK constraint.
// The provided init.sql used ENUM('ADMIN', 'BUREAU', 'POLE').

require_once __DIR__ . '/../src/db.php';

$pdo = getPDO();

try {
    // Attempt to alter the table for MySQL/MariaDB
    $query = "ALTER TABLE users MODIFY COLUMN role ENUM('ADMIN', 'BUREAU', 'POLE', 'RESP_BENEVOLE', 'RESP_PARTENAIRE', 'RESP_EVENEMENT') NOT NULL";
    $pdo->exec($query);
    echo "Schema updated successfully (MySQL/MariaDB approach).\n";
} catch (PDOException $e) {
    echo "MySQL ALTER failed or not using MySQL: " . $e->getMessage() . "\n";

    // SQLite fallback: checks are essentially immutable. 
    // We would technically need to recreate the table, but often SQLite is permissive if we didn't enforce strict CHECKs manually 
    // outside of the CREATE statement.
    // However, the CREATE statement had `role ENUM(...)`. 
    // In practice with PHP/PDO/MySQL drivers, it depends on the wrapper. 
    // If this is pure SQLite, 'ENUM' is usually treated as TEXT with a CHECK constraint.
    // Let's assume for this environment we might rely on the DB being flexible or needing recreation.
    echo "If using SQLite, manual table migration might be required if CHECK constraints block the new roles.\n";
}
