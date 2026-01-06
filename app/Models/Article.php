<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class Article extends Model {
    protected $table = 'articles';

    public function getAll(): array
    {
        // Join with users to get author name
        $sql = "SELECT a.*, u.first_name, u.last_name 
                FROM {$this->table} a 
                LEFT JOIN users u ON a.author_id = u.id 
                ORDER BY created_at DESC";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLatest(int $limit = 3): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} ORDER BY created_at DESC LIMIT :limit");
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(array $data): bool
    {
        $sql = "INSERT INTO {$this->table} (title, content, image_url, category, author_id) 
                VALUES (:title, :content, :image_url, :category, :author_id)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'title' => $data['title'],
            'content' => $data['content'],
            'image_url' => $data['image_url'] ?? null,
            'category' => $data['category'] ?? 'Generale',
            'author_id' => $data['author_id']
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
