<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class Message extends Model {
    protected $table = 'messages';

    public function getAll(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} ORDER BY cree_le DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(array $data): bool
    {
        $sql = "INSERT INTO {$this->table} (nom, email, message) 
                VALUES (:nom, :email, :message)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'nom' => $data['nom'],
            'email' => $data['email'],
            'message' => $data['message']
        ]);
    }

    public function reply($id, $replyContent)
    {
        $sql = "UPDATE {$this->table} SET reponse = :reponse, repondu_le = NOW() WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'reponse' => $replyContent,
            'id' => $id
        ]);
    }
    
    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
