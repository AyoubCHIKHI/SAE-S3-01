<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class Benevole extends Model {
    protected $table = 'benevoles';

    public function getAll() {
        return $this->query("SELECT * FROM {$this->table} ORDER BY date_creation DESC")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRecent($limit = 5) {
        $limit = (int) $limit;
        return $this->query("SELECT * FROM {$this->table} ORDER BY date_creation DESC LIMIT $limit")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->pdo->prepare("INSERT INTO {$this->table} (nom, prenom, email, telephone, ville, date_naissance, profession) VALUES (?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['nom'],
            $data['prenom'],
            $data['email'],
            $data['telephone'] ?? null,
            $data['ville'] ?? null,
            $data['date_naissance'] ?? null,
            $data['profession'] ?? null
        ]);
    }

    public function update($id, $data) {
        $stmt = $this->pdo->prepare("UPDATE {$this->table} SET nom = ?, prenom = ?, email = ?, telephone = ?, ville = ?, date_naissance = ?, profession = ? WHERE id = ?");
        return $stmt->execute([
            $data['nom'],
            $data['prenom'],
            $data['email'],
            $data['telephone'] ?? null,
            $data['ville'] ?? null,
            $data['date_naissance'] ?? null,
            $data['profession'] ?? null,
            $id
        ]);
    }
}
