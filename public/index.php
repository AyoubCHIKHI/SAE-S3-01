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


// Auth Routes
$router->get('/admin/login', 'AuthController', 'login');
$router->post('/admin/login', 'AuthController', 'login');
$router->get('/admin/logout', 'AuthController', 'logout');
$router->get('/register', 'AuthController', 'register');
$router->post('/register', 'AuthController', 'register');

// Admin Routes
$router->get('/admin', 'Admin\DashboardController', 'index');
$router->get('/admin/registrations', 'Admin\RegistrationController', 'index');
$router->get('/admin/registrations/validate', 'Admin\RegistrationController', 'validate');
$router->get('/admin/registrations/refuse', 'Admin\RegistrationController', 'refuse');

// Articles
$router->get('/admin/articles', 'Admin\ArticleController', 'index');
$router->get('/admin/articles/create', 'Admin\ArticleController', 'create');
$router->post('/admin/articles/store', 'Admin\ArticleController', 'store');
$router->get('/admin/articles/delete', 'Admin\ArticleController', 'delete');

// Benevoles
$router->get('/admin/benevoles', 'Admin\BenevoleController', 'index');
$router->get('/admin/benevoles/create', 'Admin\BenevoleController', 'create');
$router->post('/admin/benevoles/store', 'Admin\BenevoleController', 'store');
$router->get('/admin/benevoles/edit', 'Admin\BenevoleController', 'edit');
$router->post('/admin/benevoles/update', 'Admin\BenevoleController', 'update');
$router->get('/admin/benevoles/delete', 'Admin\BenevoleController', 'delete');

// Evenements
$router->get('/admin/evenements', 'Admin\EvenementController', 'index');
$router->get('/admin/evenements/create', 'Admin\EvenementController', 'create');
$router->post('/admin/evenements/store', 'Admin\EvenementController', 'store');
$router->get('/admin/evenements/edit', 'Admin\EvenementController', 'edit');
$router->post('/admin/evenements/update', 'Admin\EvenementController', 'update');
$router->get('/admin/evenements/delete', 'Admin\EvenementController', 'delete');



$router->dispatch();