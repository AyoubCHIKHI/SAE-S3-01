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

$stats = [
    'benevoles' => $benevoleModel->countAll(),
    'evenements' => $evenementModel->countAll(),
    'partenaires' => $partenaireModel->countAll()
];

// Load the dashboard view
require_once __DIR__ . '/../views/admin/dashboard.php';