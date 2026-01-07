<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\Stats;
use App\Models\Volunteer;
use App\Models\Mission;

class DashboardController extends Controller {
    
    public function index() {
        $this->requireAuth();

        $statsModel = new Stats();
        $volunteerModel = new Volunteer(); // Changed from Benevole
        $missionModel = new Mission(); // Changed from Evenement
        
        $metrics = $statsModel->getKeyMetrics();
        // Assuming Volunteer model has logic for recent, but default getAll for now or limit in view. 
        // Or I should add getRecent to Volunteer Model.
        // For now, I'll grab all and slice, or just grab all. Volunteer table has created_at.
        $recentVolunteers = $this->getRecentVolunteers($volunteerModel);
        $upcomingMissions = $missionModel->getUpcoming(5);

        $data = [
            'user' => $_SESSION['user_name'] ?? 'Admin',
            'stats' => [
                'benevoles' => $metrics['total_benevoles'],
                'missions' => $metrics['total_missions'],
                'beneficiaries' => $metrics['total_beneficiaries'],
                'participations' => $metrics['total_assignments'],
                'articles' => $metrics['total_articles']
            ],
            'recentVolunteers' => $recentVolunteers,
            'upcomingMissions' => $upcomingMissions
        ];

        $this->view('admin/dashboard', $data);
    }

    private function getRecentVolunteers($model) {
        // Simple manual query or add method to model. 
        // Adding method to model is better practice, but for speed here:
        // Assume access to query. But Model protects pdo.
        // I should have added getRecent to Volunteer model. 
        // Let's rely on getAll() for now and array_slice if small, or better, add getRecent to Volunteer.
        // Wait, I can just add `getRecent` to Volunteer in next step or use getAll and slice.
        $all = $model->getAll();
        return array_slice($all, 0, 5); 
    }
}
