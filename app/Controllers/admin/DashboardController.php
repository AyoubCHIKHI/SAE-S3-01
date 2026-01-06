<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\Stats;
use App\Models\Benevole;
use App\Models\Evenement;
use App\Models\Article;

class DashboardController extends Controller {
    
    public function index() {
        $this->requireAuth();

        $statsModel = new Stats();
        $benevoleModel = new Benevole();
        $evenementModel = new Evenement();
        
        $metrics = $statsModel->getKeyMetrics();
        $recentBenevoles = $benevoleModel->getRecent(5);
        $upcomingEvents = $evenementModel->getUpcoming(5);

        $data = [
            'user' => $_SESSION['user_name'] ?? 'Admin',
            'stats' => [
                'benevoles' => $metrics['total_benevoles'],
                'missions' => $metrics['total_events'],
                'articles' => $metrics['total_articles']
            ],
            'recentBenevoles' => $recentBenevoles,
            'upcomingEvents' => $upcomingEvents
        ];

        $this->view('admin/dashboard', $data);
    }
}
