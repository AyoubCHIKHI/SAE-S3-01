<?php

namespace Tests\Models;

use Tests\TestCase;
use App\Models\Mission;

class MissionTest extends TestCase {
    public function run() {
        echo "Exécution de MissionTest...\n";
        $this->testMissionCreation();
    }

    private function testMissionCreation() {
        $model = new Mission();
        $data = [
            'titre' => 'Mission de Test ' . uniqid(),
            'description' => 'Description de test',
            'categorie' => 'Education',
            'lieu' => 'Paris',
            'date_debut' => date('Y-m-d H:i:s', strtotime('+1 day')),
            'date_fin' => date('Y-m-d H:i:s', strtotime('+1 day +2 hours')),
            'benevoles_attendus' => 5,
            'responsable' => 'Responsable Test',
            'materiel_requis' => 'PC',
            'taches_specifiques' => 'Enseignement'
        ];
        
        $result = $model->create($data);
        $this->assertTrue($result, "La mission devrait être créée avec succès");
        
        $upcoming = $model->getUpcoming(10);
        $found = false;
        foreach ($upcoming as $m) {
            if ($m['titre'] === $data['titre']) {
                $found = true;
                break;
            }
        }
        $this->assertTrue($found, "La mission créée devrait être trouvée dans les missions à venir");
    }
}
