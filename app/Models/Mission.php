<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class Mission extends Model
{
    protected $table = 'missions';

    public function getAll()
    {
        return $this->query("SELECT * FROM {$this->table} ORDER BY date_debut DESC")->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getUpcoming($limit = 5)
    {
        $limit = (int) $limit;
        return $this->query("SELECT * FROM {$this->table} WHERE date_debut >= NOW() ORDER BY date_debut ASC LIMIT $limit")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data): bool
    {
        $sql = "INSERT INTO missions (titre, description, categorie, lieu, date_debut, date_fin, benevoles_attendus, responsable, materiel_requis, taches_specifiques) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $data['titre'],
            $data['description'],
            $data['categorie'],
            $data['lieu'],
            $data['date_debut'],
            $data['date_fin'],
            $data['benevoles_attendus'],
            $data['responsable'],
            $data['materiel_requis'],
            $data['taches_specifiques']
        ]);
    }

    public function update($id, $data): bool
    {
        $sql = "UPDATE missions SET titre = ?, description = ?, categorie = ?, lieu = ?, date_debut = ?, date_fin = ?, benevoles_attendus = ?, responsable = ?, materiel_requis = ?, taches_specifiques = ? WHERE id = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            $data['titre'],
            $data['description'],
            $data['categorie'],
            $data['lieu'],
            $data['date_debut'],
            $data['date_fin'],
            $data['benevoles_attendus'],
            $data['responsable'],
            $data['materiel_requis'],
            $data['taches_specifiques'],
            $id
        ]);
    }
}
