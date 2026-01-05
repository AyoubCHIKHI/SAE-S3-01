<?php

require_once __DIR__ . '/../../models/Partenaire.php';
require_once __DIR__ . '/../../auth.php';

require_auth([ROLE_ADMIN, ROLE_POLE]);

$partenaireModel = new Partenaire();
$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nom' => $_POST['nom'],
                'type' => $_POST['type'],
                'contact_nom' => $_POST['contact_nom'],
                'contact_email' => $_POST['contact_email'],
                'contact_telephone' => $_POST['contact_telephone'],
                'est_grand_donateur' => isset($_POST['est_grand_donateur']) ? 1 : 0
            ];

            if ($partenaireModel->create($data)) {
                header('Location: /admin/partenaires');
                exit;
            } else {
                $error = "Erreur lors de la création du partenaire.";
            }
        }
        $pageTitle = "Ajouter un partenaire";
        require __DIR__ . '/../../../views/admin/partenaires/create.php';
        break;

    case 'edit':
        $id = $_GET['id'] ?? null;
        $partenaire = $partenaireModel->getById((int) $id);

        if (!$partenaire) {
            header('Location: /admin/partenaires');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nom' => $_POST['nom'],
                'type' => $_POST['type'],
                'contact_nom' => $_POST['contact_nom'],
                'contact_email' => $_POST['contact_email'],
                'contact_telephone' => $_POST['contact_telephone'],
                'est_grand_donateur' => isset($_POST['est_grand_donateur']) ? 1 : 0
            ];

            if ($partenaireModel->update((int) $id, $data)) {
                header('Location: /admin/partenaires');
                exit;
            } else {
                $error = "Erreur lors de la modification du partenaire.";
            }
        }
        $pageTitle = "Modifier un partenaire";
        require __DIR__ . '/../../../views/admin/partenaires/edit.php';
        break;

    case 'delete':
        $id = $_GET['id'] ?? null;
        if ($id && $partenaireModel->delete((int) $id)) {
            header('Location: /admin/partenaires');
            exit;
        }
        break;

    case 'index':
    default:
        $partenaires = $partenaireModel->getAll();
        $pageTitle = "Gestion des partenaires";
        require __DIR__ . '/../../../views/admin/partenaires/index.php';
        break;
}
