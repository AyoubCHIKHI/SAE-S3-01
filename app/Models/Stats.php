<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class Stats extends Model
{

    public function getKeyMetrics(): array
    {
        
        // New Systems
        $missionModel = new Mission();
        $volunteerModel = new Volunteer(); 
        $beneficiaryModel = new Beneficiary();
        $articleModel = new Article();

        // Participation Count
        $participationCount = 0;
        try {
            $participationCount = $this->pdo->query("SELECT COUNT(*) FROM mission_volunteers")->fetchColumn();
        } catch (\Exception $e) {}

        // Donations Count (from new donators table)
        $totalDonations = 0;
        try {
            $totalDonations = $this->pdo->query("SELECT SUM(amount) FROM donators")->fetchColumn();
        } catch (\Exception $e) {}


        return [
            'total_benevoles' => $volunteerModel->countAll(),
            'total_donations' => $totalDonations,
            'total_missions' => $missionModel->countAll(),
            'total_articles' => $articleModel->countAll(),
            'total_beneficiaries' => $beneficiaryModel->countAll(),
            'total_assignments' => $participationCount
        ];
    }
}
