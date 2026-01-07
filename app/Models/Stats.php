<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class Stats extends Model
{

    public function getKeyMetrics(): array
    {
        
        $missionModel = new Mission();
        $benevoleModel = new Benevole(); 
        $beneficiaireModel = new Beneficiaire();
        $articleModel = new Article();

     
        $participationCount = 0;
        try {
            $participationCount = $this->pdo->query("SELECT COUNT(*) FROM mission_benevoles")->fetchColumn();
        } catch (\Exception $e) {}


        $totalDonations = 0;
        try {
            $totalDonations = $this->pdo->query("SELECT SUM(montant) FROM donateurs")->fetchColumn();
        } catch (\Exception $e) {}


        return [
            'total_benevoles' => $benevoleModel->countAll(),
            'total_donations' => $totalDonations ?: 0,
            'total_missions' => $missionModel->countAll(),
            'total_articles' => $articleModel->countAll(),
            'total_beneficiaires' => $beneficiaireModel->countAll(),
            'total_assignments' => $participationCount ?: 0
        ];
    }
}
