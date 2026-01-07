<?php

namespace Tests\Models;

use Tests\TestCase;
use App\Models\Article;

class ArticleTest extends TestCase {
    public function run() {
        echo "Exécution de ArticleTest...\n";
        $this->testArticleCreation();
        $this->testGetAll();
    }

    private function testArticleCreation() {
        $model = new Article();
        $data = [
            'titre' => 'Article de Test',
            'contenu' => 'Contenu de Test',
            'image_url' => '/test.png',
            'categorie' => 'Test',
            'auteur_id' => 1
        ];
        
        $result = $model->create($data);
        $this->assertTrue($result, "L'article devrait être créé avec succès");
    }

    private function testGetAll() {
        $model = new Article();
        $articles = $model->getAll();
        $this->assertTrue(is_array($articles), "getAll devrait retourner un tableau");
        $this->assertTrue(count($articles) > 0, "Il devrait y avoir au moins un article");
    }
}
