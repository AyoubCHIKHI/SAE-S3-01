<?php

require_once __DIR__ . '/../../models/Evenement.php';
require_once __DIR__ . '/../../models/User.php';

$evenementModel = new Evenement();
$userModel = new User();
$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'titre' => $_POST['titre'],
                'description' => $_POST['description'],
                'type' => $_POST['type'],
                'date_debut' => $_POST['date_debut'],
                'date_fin' => $_POST['date_fin'],
                'lieu' => $_POST['lieu'],
                'nb_benevoles_requis' => $_POST['nb_benevoles_requis'],
                'responsable_id' => !empty($_POST['responsable_id']) ? $_POST['responsable_id'] : null,
                'statut' => $_POST['statut']
            ];

            if ($evenementModel->create($data)) {
                header('Location: /admin/evenements');
                exit;
            } else {
                $error = "Erreur lors de la création de l'événement.";
            }
        }
        $users = $userModel->getAll(); // For manager dropdown
        $pageTitle = "Créer un événement";
        require __DIR__ . '/../../../views/admin/evenements/create.php';
        break;

    case 'edit':
        $id = $_GET['id'] ?? null;
        $evenement = $evenementModel->getById((int) $id);

        if (!$evenement) {
            header('Location: /admin/evenements');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'titre' => $_POST['titre'],
                'description' => $_POST['description'],
                'type' => $_POST['type'],
                'date_debut' => $_POST['date_debut'],
                'date_fin' => $_POST['date_fin'],
                'lieu' => $_POST['lieu'],
                'nb_benevoles_requis' => $_POST['nb_benevoles_requis'],
                'responsable_id' => !empty($_POST['responsable_id']) ? $_POST['responsable_id'] : null,
                'statut' => $_POST['statut']
            ];

            if ($evenementModel->update((int) $id, $data)) {
                header('Location: /admin/evenements');
                exit;
            } else {
                $error = "Erreur lors de la modification de l'événement.";
            }
        }
        $users = $userModel->getAll();
        $pageTitle = "Modifier un événement";
        require __DIR__ . '/../../../views/admin/evenements/edit.php';
        break;

    case 'delete':
        $id = $_GET['id'] ?? null;
        if ($id && $evenementModel->delete((int) $id)) {
            header('Location: /admin/evenements');
            exit;
        }
        break;

    case 'index':
    default:
        $evenements = $evenementModel->getAll();
        $pageTitle = "Gestion des événements";
        require __DIR__ . '/../../../views/admin/evenements/index.php';
        break;
}
