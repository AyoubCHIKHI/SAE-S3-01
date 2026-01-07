<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\Beneficiary;
use App\Models\Volunteer;

class BeneficiaryController extends Controller
{
    private $beneficiaryModel;
    private $volunteerModel;

    public function __construct()
    {
        $this->beneficiaryModel = new Beneficiary();
        $this->volunteerModel = new Volunteer();
    }

    public function index()
    {
        $beneficiaries = $this->beneficiaryModel->getAll();
        $this->view('admin/beneficiaries/index', ['beneficiaries' => $beneficiaries]);
    }

    public function create()
    {
        $volunteers = $this->volunteerModel->getAll();
        $this->view('admin/beneficiaries/create', ['volunteers' => $volunteers]);
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->beneficiaryModel->create($_POST);
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
        $beneficiary = $this->beneficiaryModel->find($id);
        $volunteers = $this->volunteerModel->getAll();
        $this->view('admin/beneficiaries/edit', ['beneficiary' => $beneficiary, 'volunteers' => $volunteers]);
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            if ($id) {
                $this->beneficiaryModel->update($id, $_POST);
            }
        }
        header('Location: /admin/beneficiaries');
        exit;
    }
    
    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->beneficiaryModel->delete($id);
        }
        header('Location: /admin/beneficiaries');
        exit;
    }
}
