<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class Evenement extends Model {
    protected $table = 'evenements';

    public function getAll() {
        return $this->query("SELECT * FROM {$this->table} ORDER BY date_debut ASC")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getUpcoming($limit = 5) {
        $limit = (int) $limit;
        return $this->query("SELECT * FROM {$this->table} WHERE date_debut >= CURDATE() ORDER BY date_debut ASC LIMIT $limit")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $stmt = $this->pdo->prepare("INSERT INTO {$this->table} (titre, description, type, date_debut, date_fin, nb_benevoles_requis, lieu, statut) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        return $stmt->execute([
            $data['titre'],
            $data['description'] ?? '',
            $data['type'],
            $data['date_debut'],
            $data['date_fin'],
            $data['nb_benevoles_requis'],
            $data['lieu'] ?? '',
            $data['statut'] ?? 'PLANIFIE'
        ]);
    }

    public function update($id, $data) {
        $stmt = $this->pdo->prepare("UPDATE {$this->table} SET titre = ?, description = ?, type = ?, date_debut = ?, date_fin = ?, lieu = ?, statut = ? WHERE id = ?");
        return $stmt->execute([
            $data['titre'],
            $data['description'] ?? '',
            $data['type'],
            $data['date_debut'],
            $data['date_fin'],
            $data['lieu'] ?? '',
            $data['statut'] ?? 'PLANIFIE',
            $id
        ]);
    }
}
