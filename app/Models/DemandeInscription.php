<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class DemandeInscription extends Model
{
    protected $table = 'demandes_inscription';

    public function create($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO {$this->table} (email, mot_de_passe, nom, prenom, role, profession, message) VALUES (?, ?, ?, ?, ?, ?, ?)");
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
        return $this->query("SELECT * FROM {$this->table} WHERE statut = 'pending' ORDER BY cree_le ASC")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getHistory()
    {
        return $this->query("SELECT * FROM {$this->table} WHERE statut != 'pending' ORDER BY cree_le DESC")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateStatus($id, $statut)
    {
        $stmt = $this->pdo->prepare("UPDATE {$this->table} SET statut = ? WHERE id = ?");
        return $stmt->execute([$statut, $id]);
    }

    public function validateRequest($id)
    {
        $request = $this->find($id);
        if (!$request || $request['statut'] !== 'pending') {
            return false;
        }

        $this->pdo->beginTransaction();
        try {
            // Create user for the request
            $stmt = $this->pdo->prepare("INSERT INTO utilisateurs (prenom, nom, email, mot_de_passe, role, profession, est_actif) VALUES (?, ?, ?, ?, ?, ?, 1)");
            $stmt->execute([
                $request['prenom'],
                $request['nom'],
                $request['email'],
                $request['mot_de_passe'], 
                $request['role'],
                $request['profession']
            ]);

            // Update statut
            $this->updateStatus($id, 'validated');

            $this->pdo->commit();
            return true;
        } catch (\Exception $e) {
            $this->pdo->rollBack();
            return false;
        }
    }
}
