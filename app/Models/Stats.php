<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class Stats extends Model
{

    public function getKeyMetrics(): array
    {
        $benevoleModel = new Benevole();
        $evenementModel = new Evenement();
        $versementModel = new Versement();
        $articleModel = new Article();

        return [
            'total_benevoles' => $benevoleModel->countAll(),
            'total_donations' => $versementModel->getTotalDonations(),
            'total_events' => $evenementModel->countAll(),
            'total_articles' => $articleModel->countAll(),
            'total_members' => 3000 // Mocked
        ];
    }
}
