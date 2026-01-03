<?php

require_once __DIR__ . '/../db.php';

class Article
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = getPDO();
    }

    public function getAll(): array
    {
        $stmt = $this->pdo->query("SELECT a.*, u.first_name, u.last_name FROM articles a LEFT JOIN users u ON a.author_id = u.id ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getLatest(int $limit = 3): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM articles ORDER BY created_at DESC LIMIT :limit");
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById(int $id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM articles WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(array $data): bool
    {
        $sql = "INSERT INTO articles (title, content, image_url, category, author_id) 
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

    public function update(int $id, array $data): bool
    {
        $sql = "UPDATE articles SET 
                title = :title, 
                content = :content, 
                image_url = :image_url, 
                category = :category 
                WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'id' => $id,
            'title' => $data['title'],
            'content' => $data['content'],
            'image_url' => $data['image_url'] ?? null,
            'category' => $data['category'] ?? 'Generale'
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM articles WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function countAll(): int
    {
        return $this->pdo->query("SELECT COUNT(*) FROM articles")->fetchColumn();
    }
}
