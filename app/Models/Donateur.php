<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class Donateur extends Model {
    protected $table = 'donateurs';

    public function getAll(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} ORDER BY cree_le DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(array $data): bool
    {
        $sql = "INSERT INTO {$this->table} (nom, email, telephone, montant, date, message) 
                VALUES (:nom, :email, :telephone, :montant, :date, :message)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'nom' => $data['nom'],
            'email' => $data['email'],
            'telephone' => $data['telephone'] ?? null,
            'montant' => $data['montant'] ?? 0.00,
            'date' => $data['date'] ?? date('Y-m-d'),
            'message' => $data['message'] ?? null
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}
