<?php
ob_start();


// Auto-loader
spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/../app/';
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }
    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';
    if (file_exists($file)) {
        require $file;
    }
});

session_start();

use App\Core\Router;

$router = new Router();

// Public Routes
$router->get('/', 'HomeController', 'index');
$router->get('/nous_contacter', 'HomeController', 'contact');
$router->get('/nos_actions', 'HomeController', 'actions');
$router->get('/actualites', 'ArticleController', 'index');
$router->get('/actualite', 'ArticleController', 'show');
$router->get('/egee_en_france', 'HomeController', 'egeeEnFrance');
$router->get('/nous_connaitre', 'HomeController', 'nousConnaitre');
$router->get('/nos_missions', 'HomeController', 'nosMissions');
$router->get('/rapports', 'HomeController', 'rapports');
$router->get('/videos', 'HomeController', 'videos');
$router->get('/video_egee', 'HomeController', 'videos'); // Alias for legacy support if needed
$router->get('/conseil-administration', 'HomeController', 'bureau');
$router->get('/mentions_legales', 'HomeController', 'mentionsLegales');


// Auth Routes
$router->get('/admin/login', 'AuthController', 'login');
$router->post('/admin/login', 'AuthController', 'login');
$router->get('/admin/logout', 'AuthController', 'logout');
$router->get('/register', 'AuthController', 'register');
$router->post('/register', 'AuthController', 'register');

$router->post('/don/store', 'DonateurController', 'store');
$router->post('/contact/submit', 'HomeController', 'submitContact');

// Admin Routes
$router->get('/admin', 'Admin\DashboardController', 'index');
$router->get('/admin/registrations', 'Admin\DemandeInscriptionController', 'index');
$router->get('/admin/registrations/validate', 'Admin\DemandeInscriptionController', 'validate');
$router->get('/admin/registrations/refuse', 'Admin\DemandeInscriptionController', 'refuse');

// Donateurs
$router->get('/admin/donators', 'Admin\DonateurController', 'index');
$router->post('/admin/donators/store', 'Admin\DonateurController', 'store');
$router->get('/admin/donators/delete', 'Admin\DonateurController', 'delete');

// Communications
$router->get('/admin/messages', 'Admin\MessageController', 'index');
$router->post('/admin/messages/reply', 'Admin\MessageController', 'reply');

// Articles
$router->get('/admin/articles', 'Admin\ArticleController', 'index');
$router->get('/admin/articles/create', 'Admin\ArticleController', 'create');
$router->post('/admin/articles/store', 'Admin\ArticleController', 'store');
$router->get('/admin/articles/delete', 'Admin\ArticleController', 'delete');

// Missions
$router->get('/admin/missions', 'Admin\MissionController', 'index');
$router->get('/admin/missions/create', 'Admin\MissionController', 'create');
$router->post('/admin/missions/store', 'Admin\MissionController', 'store');
$router->get('/admin/missions/edit', 'Admin\MissionController', 'edit');
$router->post('/admin/missions/update', 'Admin\MissionController', 'update');
$router->get('/admin/missions/delete', 'Admin\MissionController', 'delete');

// Volunteers (New)
$router->get('/admin/volunteers', 'Admin\BenevoleController', 'index');
$router->get('/admin/volunteers/create', 'Admin\BenevoleController', 'create');
$router->post('/admin/volunteers/store', 'Admin\BenevoleController', 'store');
$router->get('/admin/volunteers/edit', 'Admin\BenevoleController', 'edit');
$router->post('/admin/volunteers/update', 'Admin\BenevoleController', 'update');
$router->get('/admin/volunteers/delete', 'Admin\BenevoleController', 'delete');

// Beneficiaries
$router->get('/admin/beneficiaries', 'Admin\BeneficiaireController', 'index');
$router->get('/admin/beneficiaries/create', 'Admin\BeneficiaireController', 'create');
$router->post('/admin/beneficiaries/store', 'Admin\BeneficiaireController', 'store');
$router->get('/admin/beneficiaries/edit', 'Admin\BeneficiaireController', 'edit');
$router->post('/admin/beneficiaries/update', 'Admin\BeneficiaireController', 'update');
$router->get('/admin/beneficiaries/delete', 'Admin\BeneficiaireController', 'delete');

$router->dispatch();