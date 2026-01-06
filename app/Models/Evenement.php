<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class Evenement extends Model
{
    protected $table = 'evenement';

    public function getAll()
    {
        return $this->query("SELECT * FROM {$this->table} ORDER BY date_debut ASC")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUpcoming($limit = 5)
    {
        $limit = (int) $limit;
        return $this->query("SELECT * FROM {$this->table} WHERE date_debut >= CURDATE() ORDER BY date_debut ASC LIMIT $limit")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->pdo->prepare("INSERT INTO {$this->table} (titre, description, type, date_debut, date_fin, nb_benevoles_requis, lieu, statut) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $id,
            $data['titre'], // Mapping 'titre' to 'nom_'
            $data['date_debut'],
            $data['date_fin'],
            $data['nb_benevoles_requis'],
            $data['lieu'] ?? '',
            $data['statut'] ?? 'PLANIFIE'
        ]);
    }

    public function update($id, $data)
    {
        $stmt = $this->pdo->prepare("UPDATE {$this->table} SET nom_ = ?, date_debut = ?, date_fin = ? WHERE id_evenement = ?");
        return $stmt->execute([
            $data['titre'],
            $data['date_debut'],
            $data['date_fin'],
            $id
        ]);
    }

    public function find($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id_evenement = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id_evenement = ?");
        return $stmt->execute([$id]);
    }
}
