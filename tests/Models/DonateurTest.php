<?php

namespace Tests\Models;

use Tests\TestCase;
use App\Models\Donateur;

class DonateurTest extends TestCase {
    public function run() {
        echo "Exécution de DonateurTest...\n";
        $this->testDonationCreation();
    }

    private function testDonationCreation() {
        $model = new Donateur();
        $data = [
            'nom' => 'Donateur Test',
            'email' => 'don@test.com',
            'telephone' => '0102030405',
            'montant' => 50.00,
            'message' => 'Merci!'
        ];
        
        $result = $model->create($data);
        $this->assertTrue($result, "Le don devrait être enregistré avec succès");
        
        $donators = $model->getAll();
        $found = false;
        foreach ($donators as $d) {
            if ($d['nom'] === $data['nom'] && $d['montant'] == $data['montant']) {
                $found = true;
                break;
            }
        }
        $this->assertTrue($found, "Le don créé devrait être trouvé dans la liste");
    }
}
