<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Core\Database;
use PDO;

class AuthController extends Controller {

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->storeRequest();
        } else {
            $this->view('auth/register');
        }
    }

    private function storeRequest() {
        $data = [
            'email' => $_POST['email'] ?? '',
            'password' => $_POST['password'] ?? '',
            'nom' => $_POST['nom'] ?? '',
            'prenom' => $_POST['prenom'] ?? '',
            'role' => $_POST['role'] ?? '',
            'profession' => $_POST['profession'] ?? '',
            'message' => $_POST['message'] ?? ''
        ];

        // Validation basique
        if (empty($data['email']) || empty($data['password']) || empty($data['nom']) || empty($data['prenom']) || empty($data['role'])) {
            $this->view('auth/register', ['error' => 'Tous les champs obligatoires doivent être remplis.', 'data' => $data]);
            return;
        }

        // Vérifier si l'email existe déjà dans users ou registration_requests
        $db = Database::getInstance()->getConnection();
        
        // Check users
        $stmt = $db->prepare("SELECT id FROM users WHERE email = ?");
        $stmt->execute([$data['email']]);
        if ($stmt->fetch()) {
            $this->view('auth/register', ['error' => 'Cet email est déjà utilisé.', 'data' => $data]);
            return;
        }

        // Check requests
        $stmt = $db->prepare("SELECT id FROM registration_requests WHERE email = ? AND status = 'pending'");
        $stmt->execute([$data['email']]);
        if ($stmt->fetch()) {
             $this->view('auth/register', ['error' => 'Une demande est déjà en cours pour cet email.', 'data' => $data]);
             return;
        }

        $requestModel = new \App\Models\RegistrationRequest();
        if ($requestModel->create($data)) {
            $this->view('auth/register', ['success' => 'Votre demande d\'inscription a été envoyée avec succès. Elle sera examinée par un administrateur.']);
        } else {
            $this->view('auth/register', ['error' => 'Une erreur est survenue lors de l\'enregistrement de votre demande.', 'data' => $data]);
        }
    }


    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            $db = Database::getInstance()->getConnection();
            $stmt = $db->prepare("SELECT * FROM users WHERE email = ? AND is_active = 1");
            $stmt->execute([$email]);
            $user = $stmt->fetch();

            if ($user && password_verify($password, $user['password_hash'])) {
                session_regenerate_id(true);
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['first_name'] . ' ' . $user['last_name'];
                $_SESSION['role'] = $user['role'];
                
                $this->redirect('/admin');
            } else {
                $this->view('admin/login', ['error' => 'Identifiants incorrects']);
            }
        } else {
            $this->view('admin/login');
        }
    }

    public function logout() {
        session_destroy();
        $this->redirect('/');
    }
}
