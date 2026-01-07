<?php

namespace Tests\Models;

use Tests\TestCase;
use App\Models\Benevole;

class BenevoleTest extends TestCase {
    public function run() {
        echo "Exécution de BenevoleTest...\n";
        $this->testVolunteerCreation();
    }

    private function testVolunteerCreation() {
        $model = new Benevole();
        $data = [
            'prenom' => 'Jean',
            'nom' => 'Dupont',
            'email' => 'jean.dupont' . uniqid() . '@example.com',
            'telephone' => '0102030405',
            'ville' => 'PARIS',
            'profession' => 'Retraité',
            'competences' => 'Management, RH',
            'exigences_alimentaires' => 'Aucune'
        ];
        
        $result = $model->create($data);
        $this->assertTrue($result, "Le bénévole devrait être créé avec succès");
        
        $volunteers = $model->getAll();
        $found = false;
        foreach ($volunteers as $v) {
            if ($v['email'] === $data['email']) {
                $found = true;
                break;
            }
        }
        $this->assertTrue($found, "Le bénévole créé devrait être trouvé dans la base de données");
    }
}
