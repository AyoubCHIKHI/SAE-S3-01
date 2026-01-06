<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\Evenement;

class EvenementController extends Controller {
    
    public function index() {
        $this->requireAuth(['ADMIN', 'POLE']);
        $evenementModel = new Evenement();
        $evenements = $evenementModel->getAll();
        $this->view('admin/evenements/index', ['evenements' => $evenements]);
    }

    public function create() {
        $this->requireAuth(['ADMIN', 'POLE']);
        $this->view('admin/evenements/form', ['mode' => 'create']);
    }

    public function store() {
        $this->requireAuth(['ADMIN', 'POLE']);
        $evenementModel = new Evenement();
        if ($evenementModel->create($_POST)) {
            header('Location: /admin/evenements');
            exit;
        } else {
            $this->view('admin/evenements/form', ['mode' => 'create', 'error' => 'Erreur lors de la création.', 'data' => $_POST]);
        }
    }

    public function edit() {
        $this->requireAuth(['ADMIN', 'POLE']);
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: /admin/evenements');
            exit;
        }
        $evenementModel = new Evenement();
        $evenement = $evenementModel->find($id);
        
        $this->view('admin/evenements/form', ['mode' => 'edit', 'evenement' => $evenement]);
    }

    public function update() {
        $this->requireAuth(['ADMIN', 'POLE']);
        $id = $_POST['id'] ?? null;
        if (!$id) {
             header('Location: /admin/evenements');
             exit;
        }
        $evenementModel = new Evenement();
        if ($evenementModel->update($id, $_POST)) {
             header('Location: /admin/evenements');
             exit;
        } else {
             $this->view('admin/evenements/form', ['mode' => 'edit', 'evenement' => $_POST, 'error' => 'Erreur lors de la modification.']);
        }
    }

    public function delete() {
        $this->requireAuth(['ADMIN', 'POLE']);
        $id = $_GET['id'] ?? null;
        if ($id) {
            $evenementModel = new Evenement();
            $evenementModel->delete($id);
        }
        header('Location: /admin/evenements');
        exit;
    }
}
