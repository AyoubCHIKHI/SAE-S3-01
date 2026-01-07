<?php

namespace App\Controllers;

use App\Models\Donateur;

class DonateurController
{
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $prenom = htmlspecialchars($_POST['prenom'] ?? '');
            $nom = htmlspecialchars($_POST['nom'] ?? '');
            $email = htmlspecialchars($_POST['email'] ?? '');
            $telephone = htmlspecialchars($_POST['telephone'] ?? '');
            $message = htmlspecialchars($_POST['message'] ?? '');
            $montant = floatval($_POST['montant'] ?? 0);

            if (empty($nom) || empty($prenom) || empty($email) || $montant <= 0) {
                // Gérer l'erreur (par exemple, rediriger avec un message d'erreur)
                header('Location: /?error=missing_fields');
                exit;
            }

            $donateurModel = new Donateur();
            $donateurModel->create([
                'prenom' => $prenom,
                'nom' => $nom,
                'email' => $email,
                'telephone' => $telephone,
                'message' => $message,
                'montant' => $montant
            ]);

            // Rediriger avec un message de succès
            header('Location: /?success=donation_received');
            exit;
        }
    }
}
