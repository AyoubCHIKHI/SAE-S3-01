<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class RegistrationRequest extends Model
{
    protected $table = 'registration_requests';

    public function create($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO {$this->table} (email, password_hash, nom, prenom, role, profession, message) VALUES (?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['email'],
            password_hash($data['password'], PASSWORD_DEFAULT),
            $data['nom'],
            $data['prenom'],
            $data['role'],
            $data['profession'],
            $data['message'] ?? null
        ]);
    }

    public function getAllPending()
    {
        return $this->query("SELECT * FROM {$this->table} WHERE status = 'pending' ORDER BY created_at ASC")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getHistory()
    {
        return $this->query("SELECT * FROM {$this->table} WHERE status != 'pending' ORDER BY created_at DESC")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateStatus($id, $status)
    {
        $stmt = $this->pdo->prepare("UPDATE {$this->table} SET status = ? WHERE id = ?");
        return $stmt->execute([$status, $id]);
    }

    public function validateRequest($id)
    {
        $request = $this->find($id);
        if (!$request || $request['status'] !== 'pending') {
            return false;
        }

        $this->pdo->beginTransaction();
        try {
            // Create user for the request
            $stmt = $this->pdo->prepare("INSERT INTO users (first_name, last_name, email, password_hash, role, profession, is_active) VALUES (?, ?, ?, ?, ?, ?, 1)");
            $stmt->execute([
                $request['prenom'],
                $request['nom'],
                $request['email'],
                $request['password_hash'], 
                $request['role'],
                $request['profession']
            ]);

            // Update status
            $this->updateStatus($id, 'validated');

            $this->pdo->commit();
            return true;
        } catch (\Exception $e) {
            $this->pdo->rollBack();
            return false;
        }
    }
}
