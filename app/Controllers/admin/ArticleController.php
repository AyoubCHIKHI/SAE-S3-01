<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\Article;

class ArticleController extends Controller {

    public function index() {
        $this->requireAuth(['ADMIN', 'BUREAU']);
        $articleModel = new Article();
        $articles = $articleModel->getAll(); 
        $this->view('admin/articles/index', ['articles' => $articles]);
    }

    public function create() {
        $this->requireAuth();
        $this->view('admin/articles/create');
    }

    public function store() {
        $this->requireAuth();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'titre' => $_POST['titre'],
                'contenu' => $_POST['contenu'],
                'auteur_id' => $_SESSION['user_id'],
            ];
            $articleModel = new Article();
            $articleModel->create($data); 
            $this->redirect('/admin/articles');
        }
    }

    public function delete() {
        $this->requireAuth();
        $id = $_GET['id'] ?? null;
        if ($id) {
            $articleModel = new Article();
            $articleModel->delete($id);
        }
        $this->redirect('/admin/articles');
    }
}
