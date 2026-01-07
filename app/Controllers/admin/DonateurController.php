<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\Donateur;

class DonateurController extends Controller {

    public function index() {
        $this->requireAuth();
        $donateurModel = new Donateur();
        $donators = $donateurModel->getAll();
        $this->view('admin/donators/index', ['donators' => $donators]);
    }

    public function store() {
        $this->requireAuth();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nom' => $_POST['nom'],
                'email' => $_POST['email'],
                'telephone' => $_POST['telephone'] ?? '',
                'montant' => $_POST['montant'] ?? 0,
                'message' => $_POST['message'] ?? ''
            ];
            $donateurModel = new Donateur();
            $donateurModel->create($data);
            $this->redirect('/admin/donators');
        }
    }

    public function delete() {
        $this->requireAuth();
        $id = $_GET['id'] ?? null;
        if ($id) {
            $donateurModel = new Donateur();
            $donateurModel->delete($id);
        }
        $this->redirect('/admin/donators');
    }
}
