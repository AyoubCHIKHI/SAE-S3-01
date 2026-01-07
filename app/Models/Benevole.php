<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class Benevole extends Model
{
    protected $table = 'benevoles';

    public function getAll()
    {
        return $this->query("SELECT * FROM {$this->table} ORDER BY cree_le DESC")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRecent($limit = 5)
    {
        $limit = (int) $limit;
        return $this->query("SELECT * FROM {$this->table} ORDER BY cree_le DESC LIMIT $limit")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data): bool
    {
        $sql = "INSERT INTO {$this->table} (prenom, nom, date_naissance, email, telephone, ville, profession, competences, exigences_alimentaires) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $data['prenom'],
            $data['nom'],
            $data['date_naissance'] ?? null,
            $data['email'],
            $data['telephone'] ?? null,
            $data['ville'] ?? null,
            $data['profession'] ?? null,
            $data['competences'] ?? null,
            $data['exigences_alimentaires'] ?? null
        ]);
    }

    public function update($id, $data): bool
    {
        $sql = "UPDATE {$this->table} SET prenom = ?, nom = ?, date_naissance = ?, email = ?, telephone = ?, ville = ?, profession = ?, competences = ?, exigences_alimentaires = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $data['prenom'],
            $data['nom'],
            $data['date_naissance'] ?? null,
            $data['email'],
            $data['telephone'] ?? null,
            $data['ville'] ?? null,
            $data['profession'] ?? null,
            $data['competences'] ?? null,
            $data['exigences_alimentaires'] ?? null,
            $id
        ]);
    }
}
