<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class Donator extends Model {
    protected $table = 'donators';

    public function getAll(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} ORDER BY created_at DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(array $data): bool
    {
        $sql = "INSERT INTO {$this->table} (name, email, phone, amount, date, message) 
                VALUES (:name, :email, :phone, :amount, :date, :message)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone' => $data['phone'] ?? null,
            'amount' => $data['amount'] ?? 0.00,
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
