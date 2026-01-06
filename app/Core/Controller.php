<?php
namespace App\Core;

class Controller {
    protected function view($view, $data = []) {
        extract($data);
        // Assuming views are in app/Views, possibly with subfolders
        $viewPath = __DIR__ . "/../Views/$view.php";
        if (file_exists($viewPath)) {
            require $viewPath;
        } else {
            die("View $view not found");
        }
    }

    protected function redirect($url) {
        header("Location: $url");
        exit;
    }

    // Helper to check auth
    protected function requireAuth($roles = []) {
        // Simple session check logic (migrated from auth.php)
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user_id'])) {
            $this->redirect('/admin/login');
        }
        // Role check can be added here
    }
}
