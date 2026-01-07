<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\Beneficiaire;
use App\Models\Benevole;

class BeneficiaireController extends Controller
{
    private $beneficiaireModel;
    private $benevoleModel;

    public function __construct()
    {
        $this->beneficiaireModel = new Beneficiaire();
        $this->benevoleModel = new Benevole();
    }

    public function index()
    {
        $beneficiaires = $this->beneficiaireModel->getAll();
        $this->view('admin/beneficiaries/index', ['beneficiaries' => $beneficiaires]);
    }

    public function create()
    {
        $benevoles = $this->benevoleModel->getAll();
        $this->view('admin/beneficiaries/create', ['volunteers' => $benevoles]);
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->beneficiaireModel->create($_POST);
        }
        header('Location: /admin/beneficiaries');
        exit;
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: /admin/beneficiaries');
            exit;
        }
        $beneficiaire = $this->beneficiaireModel->find($id);
        $benevoles = $this->benevoleModel->getAll();
        $this->view('admin/beneficiaries/edit', ['beneficiary' => $beneficiaire, 'volunteers' => $benevoles]);
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            if ($id) {
                $this->beneficiaireModel->update($id, $_POST);
            }
        }
        header('Location: /admin/beneficiaries');
        exit;
    }
    
    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->beneficiaireModel->delete($id);
        }
        header('Location: /admin/beneficiaries');
        exit;
    }
}
