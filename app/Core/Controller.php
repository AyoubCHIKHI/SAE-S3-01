<?php
namespace App\Core;

class Controller {
    protected function view($view, $data = []) {
        extract($data);
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

    protected function requireAuth($allowedRoles = []) {
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user_id'])) {
            $this->redirect('/admin/login');
        }

        // Role check
        if (!empty($allowedRoles)) {
            $userRole = $_SESSION['role'] ?? '';
            // si le role de l'utilisateur n'est pas dans la liste des rôles autorisés
            if (!in_array($userRole, $allowedRoles)) {
                // rediriger vers le dashboard
                $this->redirect('/admin'); 
            }
        }

        // Prevent caching of protected pages
        header('Cache-Control: no-cache, no-store, must-revalidate');
        header('Pragma: no-cache');
        header('Expires: 0');
    }

    /**
     * Valide que les champs requis sont présents et non vides.
     */
    protected function validateFields($data, $requiredFields) {
        foreach ($requiredFields as $field) {
            if (!isset($data[$field]) || trim((string)$data[$field]) === '') {
                return false;
            }
        }
        return true;
    }
}
