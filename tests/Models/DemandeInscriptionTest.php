<?php

namespace Tests\Models;

use Tests\TestCase;
use App\Models\DemandeInscription;

class DemandeInscriptionTest extends TestCase {
    public function run() {
        echo "Exécution de DemandeInscriptionTest...\n";
        $this->testRequestCreation();
    }

    private function testRequestCreation() {
        $model = new DemandeInscription();
        $email = 'test' . uniqid() . '@egee.asso.fr';
        $data = [
            'email' => $email,
            'password' => 'password123',
            'nom' => 'NomTest',
            'prenom' => 'PrenomTest',
            'role' => 'BENEVOLE',
            'profession' => 'Testeur',
            'message' => 'Je veux aider.'
        ];
        
        $result = $model->create($data);
        $this->assertTrue($result, "La demande d'inscription devrait être créée avec succès");
        
        $pending = $model->getAllPending();
        $found = false;
        foreach ($pending as $r) {
            if ($r['email'] === $email) {
                $found = true;
                break;
            }
        }
        $this->assertTrue($found, "La demande créée devrait être dans la liste des demandes en attente");
    }
}
