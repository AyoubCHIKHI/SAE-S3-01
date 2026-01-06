<?php
namespace App\Controllers\Admin;

use App\Core\Controller;
use App\Models\Article;

class ArticleController extends Controller {

    public function index() {
        $this->requireAuth();
        $articleModel = new Article();
        $articles = $articleModel->getAll(); // Need to ensure getAll exists in Model
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
                'title' => $_POST['title'],
                'content' => $_POST['content'],
                'author_id' => $_SESSION['user_id'],
                // Handle image upload if needed
            ];
            $articleModel = new Article();
            $articleModel->create($data); // Need to ensure create exists
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
