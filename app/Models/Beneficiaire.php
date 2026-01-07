<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class Beneficiaire extends Model
{
    protected $table = 'beneficiaires';

    public function getAll()
    {
        return $this->query("
            SELECT b.*, v.prenom as v_prenom, v.nom as v_nom 
            FROM beneficiaires b 
            LEFT JOIN benevoles v ON b.benevole_assigne_id = v.id 
            ORDER BY b.cree_le DESC
        ")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $sql = "INSERT INTO beneficiaires (prenom, nom, email, telephone, besoins, notes, benevole_assigne_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
        return $this->query($sql, [
            $data['prenom'],
            $data['nom'],
            $data['email'],
            $data['telephone'],
            $data['besoins'],
            $data['notes'],
            $data['benevole_assigne_id'] ?: null
        ]);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE beneficiaires SET prenom = ?, nom = ?, email = ?, telephone = ?, besoins = ?, notes = ?, benevole_assigne_id = ? WHERE id = ?";
        return $this->query($sql, [
            $data['prenom'],
            $data['nom'],
            $data['email'],
            $data['telephone'],
            $data['besoins'],
            $data['notes'],
            $data['benevole_assigne_id'] ?: null,
            $id
        ]);
    }
}
