<?php

$uri = $_SERVER['REQUEST_URI'];

switch ($uri) {
    case '/':
        require_once __DIR__ . '/../views/accueil.php';
        break;
    case '/nous_contacter':
        require_once __DIR__ . '/../views/nous_contacter.php';
        break;
    case '/nos_actions':
        require_once __DIR__ . '/../views/nos_actions.php';
        break;
    case '/nos_actions/education':
        require_once __DIR__ . '/../views/nos_actions.php';
        break;
    case '/nos_missions':
        require_once __DIR__ . '/../views/Nos_Missions.php';
        break;
    case '/egee_en_france':
        require_once __DIR__ . '/../views/egee_en_france.php';
        break;
    case '/nous_connaitre':
        require_once __DIR__ . '/../views/nous_connaitre.php';
        break;
    case '/rapport-activitee':
        require_once __DIR__ . '/../views/rapport-activite.php';
        break;
    case '/conseil-administration':
        require_once __DIR__ . '/../views/conseil-administration.php';
        break;
    case '/video_egee':
        require_once __DIR__ . '/../views/video_egee.php';
        break;
    case '/admin':
        require_once __DIR__ . '/admin.php';
        break;
    default:
        echo '404: Pas trouvé';
}