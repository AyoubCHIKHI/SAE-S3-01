<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\Donator;

class DonatorController extends Controller {

    public function index() {
        $this->requireAuth();
        $donatorModel = new Donator();
        $donators = $donatorModel->getAll();
        $this->view('admin/donators/index', ['donators' => $donators]);
    }

    public function store() {
        $this->requireAuth();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'] ?? '',
                'amount' => $_POST['amount'] ?? 0,
                'message' => $_POST['message'] ?? ''
            ];
            $donatorModel = new Donator();
            $donatorModel->create($data);
            $this->redirect('/admin/donators');
        }
    }

    public function delete() {
        $this->requireAuth();
        $id = $_GET['id'] ?? null;
        if ($id) {
            $donatorModel = new Donator();
            $donatorModel->delete($id);
        }
        $this->redirect('/admin/donators');
    }
}
