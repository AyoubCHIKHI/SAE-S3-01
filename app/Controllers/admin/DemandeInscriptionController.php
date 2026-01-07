<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\DemandeInscription;
use App\Core\Database;

class DemandeInscriptionController extends Controller
{
    // Liste des demandes en attente
    public function index()
    {
        $this->requireAuth(['ADMIN']);

        $demandeModel = new DemandeInscription();
        $requests = $demandeModel->getAllPending();
        $history = $demandeModel->getHistory();

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

        $demandeModel = new DemandeInscription();
        $request = $demandeModel->find($id);

        if (!$request || $request['statut'] !== 'pending') {
            $this->redirect('/admin/registrations');
            return;
        }

        // Déléguer au Modèle
        $demandeModel->validateRequest($id);

        $this->redirect('/admin/registrations');
    }

    public function refuse()
    {
        $this->requireAuth(['ADMIN']);

        $id = $_GET['id'] ?? null;
        if ($id) {
            $demandeModel = new DemandeInscription();
            $demandeModel->updateStatus($id, 'refused');
        }

        $this->redirect('/admin/registrations');
    }
}
