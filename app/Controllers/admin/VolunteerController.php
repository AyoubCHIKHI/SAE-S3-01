<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\Volunteer;

class VolunteerController extends Controller
{
    private $volunteerModel;

    public function __construct()
    {
        $this->volunteerModel = new Volunteer();
    }

    public function index()
    {
        $volunteers = $this->volunteerModel->getAll();
        $this->view('admin/volunteers/index', ['volunteers' => $volunteers]);
    }

    public function create()
    {
        $villeModel = new \App\Models\Ville();
        $villes = $villeModel->getAll();
        $this->view('admin/volunteers/create', ['villes' => $villes]);
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->volunteerModel->create($_POST);
        }
        header('Location: /admin/volunteers');
        exit;
    }

    public function edit()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            header('Location: /admin/volunteers');
            exit;
        }
        $volunteer = $this->volunteerModel->find($id);
        
        $villeModel = new \App\Models\Ville();
        $villes = $villeModel->getAll();
        
        $this->view('admin/volunteers/edit', ['volunteer' => $volunteer, 'villes' => $villes]);
    }

    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            if ($id) {
                $this->volunteerModel->update($id, $_POST);
            }
        }
        header('Location: /admin/volunteers');
        exit;
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->volunteerModel->delete($id);
        }
        header('Location: /admin/volunteers');
        exit;
    }
}
