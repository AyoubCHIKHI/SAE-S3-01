<?php
namespace App\Controllers;

use App\Core\Controller;

use App\Models\Article;

class HomeController extends Controller {
    public function index() {
        $articleModel = new Article();
        $latestArticles = $articleModel->getLatest(3);
        $this->view('accueil', ['latestArticles' => $latestArticles]);
    }

    public function contact() {
        $this->view('nous_contacter');
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
}
