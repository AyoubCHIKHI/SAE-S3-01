<?php

require_once __DIR__ . '/../../models/Benevole.php';
require_once __DIR__ . '/../../auth.php';

require_auth([ROLE_ADMIN, ROLE_POLE]);

$benevoleModel = new Benevole();
$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'create':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'email' => $_POST['email'],
                'telephone' => $_POST['telephone'],
                'ville' => $_POST['ville'],
                'date_naissance' => $_POST['date_naissance'],
                'profession' => $_POST['profession'],
                'regime_alimentaire' => $_POST['regime_alimentaire'],
                'restrictions_sante' => $_POST['restrictions_sante'],
                'infos_diversite' => $_POST['infos_diversite']
            ];

            if ($benevoleModel->create($data)) {
                header('Location: /admin/benevoles');
                exit;
            } else {
                $error = "Erreur lors de la création du bénévole.";
            }
        }
        $pageTitle = "Ajouter un bénévole";
        require __DIR__ . '/../../../views/admin/benevoles/create.php';
        break;

    case 'edit':
        $id = $_GET['id'] ?? null;
        $benevole = $benevoleModel->getById((int) $id);

        if (!$benevole) {
            header('Location: /admin/benevoles');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'email' => $_POST['email'],
                'telephone' => $_POST['telephone'],
                'ville' => $_POST['ville'],
                'date_naissance' => $_POST['date_naissance'],
                'profession' => $_POST['profession'],
                'regime_alimentaire' => $_POST['regime_alimentaire'],
                'restrictions_sante' => $_POST['restrictions_sante'],
                'infos_diversite' => $_POST['infos_diversite']
            ];

            if ($benevoleModel->update((int) $id, $data)) {
                header('Location: /admin/benevoles');
                exit;
            } else {
                $error = "Erreur lors de la modification du bénévole.";
            }
        }
        $pageTitle = "Modifier un bénévole";
        require __DIR__ . '/../../../views/admin/benevoles/edit.php';
        break;

    case 'delete':
        $id = $_GET['id'] ?? null;
        if ($id && $benevoleModel->delete((int) $id)) {
            header('Location: /admin/benevoles');
            exit;
        }
        break;

    case 'index':
    default:
        $benevoles = $benevoleModel->getAll();
        $pageTitle = "Gestion des bénévoles";
        require __DIR__ . '/../../../views/admin/benevoles/index.php';
        break;
}
