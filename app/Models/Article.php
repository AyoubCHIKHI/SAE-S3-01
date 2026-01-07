<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class Article extends Model {
    protected $table = 'articles';

    public function getAll(): array
    {
        $sql = "SELECT a.*, u.prenom, u.nom 
                FROM {$this->table} a 
                LEFT JOIN utilisateurs u ON a.auteur_id = u.id 
                ORDER BY cree_le DESC";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLatest(int $limit = 3): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} ORDER BY cree_le DESC LIMIT :limit");
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(array $data): bool
    {
        $sql = "INSERT INTO {$this->table} (titre, contenu, image_url, categorie, auteur_id) 
                VALUES (:titre, :contenu, :image_url, :categorie, :auteur_id)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'titre' => $data['titre'],
            'contenu' => $data['contenu'],
            'image_url' => $data['image_url'] ?? null,
            'categorie' => $data['categorie'] ?? 'Generale',
            'auteur_id' => $data['auteur_id']
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function getById(int $id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
