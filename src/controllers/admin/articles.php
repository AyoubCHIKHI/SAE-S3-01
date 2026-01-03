<?php

require_once __DIR__ . '/../../auth.php';
require_once __DIR__ . '/../../models/Article.php';

// Ensure user is logged in and has rights
require_auth([ROLE_ADMIN, ROLE_BUREAU, ROLE_POLE]);

$articleModel = new Article();
$action = $_GET['action'] ?? 'index';

if ($action === 'create') {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $title = $_POST['title'] ?? '';
        $content = $_POST['content'] ?? '';
        $category = $_POST['category'] ?? 'Generale';
        $author_id = $_SESSION['user_id'];
        
        $image_url = null;
        
        // Handle Image Upload
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . '/../../../public/uploads/articles/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            
            $filename = uniqid() . '_' . basename($_FILES['image']['name']);
            $targetPath = $uploadDir . $filename;
            
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
                $image_url = '/uploads/articles/' . $filename;
            }
        }

        if ($articleModel->create([
            'title' => $title, 
            'content' => $content, 
            'image_url' => $image_url, 
            'category' => $category, 
            'author_id' => $author_id
        ])) {
            header('Location: /admin/articles');
            exit;
        } else {
            $error = "Erreur lors de la création de l'article.";
        }
    }
    
    // View for creating article
    $pageTitle = "Créer un article";
    require __DIR__ . '/../../../views/admin/articles/create.php';

} elseif ($action === 'delete') {
    $id = $_POST['id'] ?? null;
    if ($id) {
        $articleModel->delete((int)$id);
    }
    header('Location: /admin/articles');
    exit;

} else {
    // List articles
    $articles = $articleModel->getAll();
    $pageTitle = "Gérer les actualités";
    require __DIR__ . '/../../../views/admin/articles/index.php';
}
