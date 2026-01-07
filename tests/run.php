<?php

// tests/run.php
// Simple test runner for the project

error_reporting(E_ALL);
ini_set('display_errors', 1);

const BASE_PATH = __DIR__ . '/..';

// Autoloader
spl_autoload_register(function ($class) {
    if (strpos($class, 'App\\') === 0) {
        $file = BASE_PATH . '/app/' . str_replace('\\', '/', substr($class, 4)) . '.php';
        if (file_exists($file)) require_once $file;
    } elseif (strpos($class, 'Tests\\') === 0) {
        $file = BASE_PATH . '/tests/' . str_replace('\\', '/', substr($class, 6)) . '.php';
        if (file_exists($file)) require_once $file;
    }
});

echo "Démarrage des tests unitaires...\n";
echo "==============================\n\n";

$tests = [
    \Tests\Models\ArticleTest::class,
    \Tests\Models\BenevoleTest::class,
    \Tests\Models\MissionTest::class,
    \Tests\Models\DemandeInscriptionTest::class,
    \Tests\Models\DonateurTest::class,
    // Ajoutez d'autres classes de test ici
];

$totalPassed = 0;
$totalFailed = 0;
$allFailures = [];

foreach ($tests as $testClass) {
    $testInstance = new $testClass();
    if (method_exists($testInstance, 'run')) {
        $testInstance->run();
    }
    
    $summary = $testInstance->getSummary();
    $totalPassed += $summary['passed'];
    $totalFailed += $summary['failed'];
    $allFailures = array_merge($allFailures, $summary['failures']);
}

echo "\n==============================\n";
echo "Résultats des tests :\n";
echo "Réussis : $totalPassed\n";
echo "Échecs  : $totalFailed\n";

if ($totalFailed > 0) {
    echo "\nDétails des échecs :\n";
    foreach ($allFailures as $fail) {
        echo "- $fail\n";
    }
    exit(1);
}

echo "\nTous les tests ont réussi !\n";
exit(0);
