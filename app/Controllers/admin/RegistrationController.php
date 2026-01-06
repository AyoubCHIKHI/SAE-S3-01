<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\RegistrationRequest;
use App\Core\Database;

class RegistrationController extends Controller
{
    // List pending requests
    public function index()
    {
        $this->requireAuth(['ADMIN']);

        $requestModel = new RegistrationRequest();
        $requests = $requestModel->getAllPending();
        $history = $requestModel->getHistory();

        $this->view('admin/registrations/index', ['requests' => $requests, 'history' => $history]);
    }

    public function validate()
    {
        $this->requireAuth(['ADMIN']);

        $id = $_GET['id'] ?? null;
        if (!$id) {
            $this->redirect('/admin/registrations');
            return;
        }

        $requestModel = new RegistrationRequest();
        $request = $requestModel->find($id);

        if (!$request || $request['status'] !== 'pending') {
            $this->redirect('/admin/registrations');
            return;
        }

        // Delegate to Model
        $requestModel->validateRequest($id);

        $this->redirect('/admin/registrations');
    }

    public function refuse()
    {
        $this->requireAuth(['ADMIN']);

        $id = $_GET['id'] ?? null;
        if ($id) {
            $requestModel = new RegistrationRequest();
            $requestModel->updateStatus($id, 'refused');
        }

        $this->redirect('/admin/registrations');
    }
}
