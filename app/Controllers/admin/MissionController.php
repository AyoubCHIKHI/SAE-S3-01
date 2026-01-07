<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\Mission;

class MissionController extends Controller
{
    private $missionModel;

    public function __construct()
    {
        $this->missionModel = new Mission();
    }

    public function index()
    {
        $missions = $this->missionModel->getAll();
        $this->view('admin/missions/index', ['missions' => $missions]);
    }

    public function create()
    {
        $this->view('admin/missions/create');
    }

    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->missionModel->create($_POST);
        }
        header('Location: /admin/missions');
        exit;
    }

    public function edit() 
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
             header('Location: /admin/missions');
             exit;
        }
        $mission = $this->missionModel->find($id);
        $this->view('admin/missions/edit', ['mission' => $mission]);
    }
    
    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'] ?? null;
            if ($id) {
                 $this->missionModel->update($id, $_POST);
            }
        }
        header('Location: /admin/missions');
        exit;
    }

    public function delete()
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $this->missionModel->delete($id);
        }
        header('Location: /admin/missions');
        exit;
    }
}
