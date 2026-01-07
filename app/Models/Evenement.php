<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class Evenement extends Model
{
    protected $table = 'missions';

    public function getAll()
    {
        return $this->query("SELECT * FROM {$this->table} ORDER BY date_debut ASC")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUpcoming($limit = 5)
    {
        $limit = (int) $limit;
        return $this->query("SELECT * FROM {$this->table} WHERE date_debut >= CURDATE() ORDER BY date_debut ASC LIMIT $limit")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $sql = "INSERT INTO {$this->table} (titre, description, categorie, lieu, date_debut, date_fin, benevoles_attendus, responsable, materiel_requis, taches_specifiques) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        return $this->query($sql, [
            $data['titre'],
            $data['description'] ?? null,
            $data['categorie'] ?? null,
            $data['lieu'] ?? null,
            $data['date_debut'],
            $data['date_fin'],
            $data['benevoles_attendus'] ?? 0,
            $data['responsable'] ?? null,
            $data['materiel_requis'] ?? null,
            $data['taches_specifiques'] ?? null
        ]);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE {$this->table} SET titre = ?, description = ?, categorie = ?, lieu = ?, date_debut = ?, date_fin = ?, benevoles_attendus = ?, responsable = ?, materiel_requis = ?, taches_specifiques = ? WHERE id = ?";
        return $this->query($sql, [
            $data['titre'],
            $data['description'] ?? null,
            $data['categorie'] ?? null,
            $data['lieu'] ?? null,
            $data['date_debut'],
            $data['date_fin'],
            $data['benevoles_attendus'] ?? 0,
            $data['responsable'] ?? null,
            $data['materiel_requis'] ?? null,
            $data['taches_specifiques'] ?? null,
            $id
        ]);
    }
}
