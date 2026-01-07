<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\Benevole;

class BenevoleController extends Controller
{

    public function index()
    {
        $this->requireAuth(['ADMIN', 'BUREAU']);
        $benevoleModel = new Benevole();
        $benevoles = $benevoleModel->getAll();
        $this->view('admin/volunteers/index', ['volunteers' => $benevoles]);
    }

    public function create()
    {
        $this->requireAuth(['ADMIN', 'BUREAU']);
        $villeModel = new \App\Models\Ville();
        $evenementModel = new \App\Models\Evenement();
        $villes = $villeModel->getAll();
        $evenements = $evenementModel->getAll();

        $this->view('admin/volunteers/create', [
            'villes' => $villes
        ]);
    }

    public function store()
    {
        $this->requireAuth(['ADMIN', 'BUREAU']);
        $benevoleModel = new Benevole();
        if ($benevoleModel->create($_POST)) {
            header('Location: /admin/volunteers');
            exit;
        } else {
            // Handle error
            $this->view('admin/volunteers/create', ['error' => 'Erreur lors de la création.', 'data' => $_POST]);
        }
    }

    public function edit()
    {
        $this->requireAuth(['ADMIN', 'BUREAU']);
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: /admin/volunteers');
            exit;
        }
        $benevoleModel = new Benevole();
        $benevole = $benevoleModel->find($id);

        $villeModel = new \App\Models\Ville();
        $evenementModel = new \App\Models\Evenement();
        $villes = $villeModel->getAll();
        $evenements = $evenementModel->getAll();

        $this->view('admin/volunteers/edit', [
            'volunteer' => $benevole,
            'villes' => $villes
        ]);
    }

    public function update()
    {
        $this->requireAuth(['ADMIN', 'BUREAU']);
        $id = $_POST['id'] ?? null;
        if (!$id) {
            header('Location: /admin/volunteers');
            exit;
        }
        $benevoleModel = new Benevole();
        if ($benevoleModel->update($id, $_POST)) {
            header('Location: /admin/volunteers');
            exit;
        } else {
            $this->view('admin/volunteers/edit', ['volunteer' => $_POST, 'error' => 'Erreur lors de la modification.']);
        }
    }

    public function delete()
    {
        $this->requireAuth(['ADMIN', 'BUREAU']);
        $id = $_GET['id'] ?? null;
        if ($id) {
            $benevoleModel = new Benevole();
            $benevoleModel->delete($id);
        }
        header('Location: /admin/volunteers');
        exit;
    }
}
