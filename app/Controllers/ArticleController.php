<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Article;

class ArticleController extends Controller {

    public function index() {
        $articleModel = new Article();
        $articles = $articleModel->getAll();
        $this->view('actualites', ['articles' => $articles]);
    }

    public function show() {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            $this->redirect('/actualites');
        }

        $articleModel = new Article();
        $article = $articleModel->getById($id);

        if (!$article) {
             // 404
             http_response_code(404);
             echo "Article non trouvé";
             return;
        }

        $this->view('article_detail', ['article' => $article]);
    }
}
