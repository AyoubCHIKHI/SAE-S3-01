<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\Stats;
use App\Models\Benevole;
use App\Models\Mission;

class DashboardController extends Controller {
    
    public function index() {
        $this->requireAuth();

        $statsModel = new Stats();
        $benevoleModel = new Benevole();
        $missionModel = new Mission(); 
        
        $metrics = $statsModel->getKeyMetrics();
        $recentVolunteers = $this->getRecentVolunteers($benevoleModel);
        $upcomingMissions = $missionModel->getUpcoming(5);

        $data = [
            'user' => $_SESSION['user_name'] ?? 'Admin',
            'stats' => [
                'benevoles' => $metrics['total_benevoles'],
                'missions' => $metrics['total_missions'],
                'beneficiaires' => $metrics['total_beneficiaires'],
                'participations' => $metrics['total_assignments'],
                'articles' => $metrics['total_articles']
            ],
            'recentVolunteers' => $recentVolunteers,
            'upcomingMissions' => $upcomingMissions
        ];

        $this->view('admin/dashboard', $data);
    }

    private function getRecentVolunteers($model) {
        $all = $model->getAll();
        return array_slice($all, 0, 5); 
    }
}
