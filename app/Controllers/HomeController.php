<?php
namespace App\Controllers;

use App\Core\Controller;

use App\Models\Article;
use App\Models\Message;

class HomeController extends Controller {
    public function index() {
        $articleModel = new Article();
        $latestArticles = $articleModel->getLatest(3);
        $this->view('accueil', ['latestArticles' => $latestArticles]);
    }

    public function contact() {
        $this->view('nous_contacter');
    }
    
    public function submitContact() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nom = trim($_POST['nom'] ?? '');
            $prenom = trim($_POST['prenom'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $messageContent = trim($_POST['message'] ?? '');
            
            if ($nom && $email && $messageContent) {
                $messageModel = new Message();
                $messageModel->create([
                    'name' => "$nom $prenom",
                    'email' => $email,
                    'message' => $messageContent
                ]);
                
                // Redirect with success (simplistic for now)
                header('Location: /nous_contacter?success=1');
                exit;
            }
        }
        header('Location: /nous_contacter?error=1');
        exit;
    }

    public function actions() {
        $this->view('nos_actions');
    }

    public function egeeEnFrance() {
        $this->view('egee_en_france');
    }

    public function nousConnaitre() {
        $this->view('nous_connaitre');
    }

    public function nosMissions() {
        $this->view('nos_missions');
    }

    public function rapports() {
        $this->view('rapports_activites');
    }

    public function videos() {
        $this->view('video_egee');
    }

    public function bureau() {
        $this->view('bureau');
    }

    public function mentionsLegales() {
        $this->view('mentions_legales');
    }
}
