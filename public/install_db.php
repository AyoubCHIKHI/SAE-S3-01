<?php
require_once __DIR__ . '/../src/db.php';

try {
    $pdo = getPDO();
    echo "<pre>";
    echo "Connected to database.\n";

    $sqlFile = __DIR__ . '/../database/init.sql';
    if (!file_exists($sqlFile)) {
        die("Error: init.sql not found at $sqlFile\n");
    }

    $sql = file_get_contents($sqlFile);

    try {
        $pdo->exec($sql);
        echo "Executed SQL file successfully.\n";
        echo "Tables created: benevoles, evenements, partenaires, participations.\n";
    } catch (PDOException $e) {
        echo "Single execution failed. Trying splitting statements...\n";
        $statements = explode(';', $sql);
        foreach ($statements as $stmt) {
            $stmt = trim($stmt);
            if (!empty($stmt)) {
                try {
                    $pdo->exec($stmt);
                    echo "Executed statement.\n";
                } catch (PDOException $e2) {
                    echo "Warning: " . $e2->getMessage() . "\n";
                }
            }
        }
    }
    echo "Done. You can now delete this file and access the admin dashboard.";
    echo "</pre>";

} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
