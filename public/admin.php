<?php

require_once __DIR__ . '/../src/auth.php';

// Force authentification
require_auth([ROLE_ADMIN, ROLE_BUREAU, ROLE_POLE]);

// Models
require_once __DIR__ . '/../src/models/Benevole.php';
require_once __DIR__ . '/../src/models/Evenement.php';
require_once __DIR__ . '/../src/models/Partenaire.php';

$benevoleModel = new Benevole();
$evenementModel = new Evenement();
$partenaireModel = new Partenaire();

require_once __DIR__ . '/../src/models/Stats.php';

$statsService = new Stats();
$metrics = $statsService->getKeyMetrics();
$benevoleGrowth = $statsService->getBenevoleGrowth();
$donationTrends = $statsService->getDonationTrends();

$stats = [
    'benevoles' => $metrics['total_benevoles'],
    'evenements' => $metrics['total_events'],
    'partenaires' => $partenaireModel ? $partenaireModel->countAll() : 0,
    'donations' => $metrics['total_donations'],
    'members' => $metrics['total_members']
];

// Load the dashboard view
require_once __DIR__ . '/../views/admin/dashboard.php';