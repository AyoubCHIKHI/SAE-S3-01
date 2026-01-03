<?php

require_once __DIR__ . '/../db.php';

class Document
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = getPDO();
    }

    public function getAll(): array
    {
        $stmt = $this->pdo->query("SELECT d.*, u.first_name, u.last_name FROM documents d LEFT JOIN users u ON d.uploaded_by = u.id ORDER BY created_at DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById(int $id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM documents WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(array $data): bool
    {
        $sql = "INSERT INTO documents (title, description, file_path, uploaded_by, category) 
                VALUES (:title, :description, :file_path, :uploaded_by, :category)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'title' => $data['title'],
            'description' => $data['description'] ?? null,
            'file_path' => $data['file_path'],
            'uploaded_by' => $data['uploaded_by'],
            'category' => $data['category'] ?? 'Divers'
        ]);
    }

    public function delete(int $id): bool
    {
        // First get file path to delete file
        $doc = $this->getById($id);
        if ($doc && file_exists(__DIR__ . '/../../public' . $doc['file_path'])) {
            unlink(__DIR__ . '/../../public' . $doc['file_path']);
        }

        $stmt = $this->pdo->prepare("DELETE FROM documents WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
