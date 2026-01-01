<?php

require_once __DIR__ . '/../db.php';

class Evenement
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = getPDO();
    }

    public function getAll(): array
    {
        $sql = "SELECT e.*, u.first_name, u.last_name 
                FROM evenements e 
                LEFT JOIN users u ON e.responsable_id = u.id 
                ORDER BY e.date_debut DESC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById(int $id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM evenements WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(array $data): bool
    {
        $sql = "INSERT INTO evenements (titre, description, type, date_debut, date_fin, lieu, nb_benevoles_requis, responsable_id, statut) 
                VALUES (:titre, :description, :type, :date_debut, :date_fin, :lieu, :nb_benevoles_requis, :responsable_id, :statut)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'titre' => $data['titre'],
            'description' => $data['description'] ?? null,
            'type' => $data['type'],
            'date_debut' => $data['date_debut'],
            'date_fin' => $data['date_fin'],
            'lieu' => $data['lieu'] ?? null,
            'nb_benevoles_requis' => $data['nb_benevoles_requis'] ?? 0,
            'responsable_id' => $data['responsable_id'] ?? null,
            'statut' => $data['statut'] ?? 'PLANIFIE'
        ]);
    }

    public function update(int $id, array $data): bool
    {
        $sql = "UPDATE evenements SET 
                titre = :titre, 
                description = :description, 
                type = :type, 
                date_debut = :date_debut, 
                date_fin = :date_fin, 
                lieu = :lieu, 
                nb_benevoles_requis = :nb_benevoles_requis, 
                responsable_id = :responsable_id, 
                statut = :statut
                WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'id' => $id,
            'titre' => $data['titre'],
            'description' => $data['description'] ?? null,
            'type' => $data['type'],
            'date_debut' => $data['date_debut'],
            'date_fin' => $data['date_fin'],
            'lieu' => $data['lieu'] ?? null,
            'nb_benevoles_requis' => $data['nb_benevoles_requis'] ?? 0,
            'responsable_id' => $data['responsable_id'] ?? null,
            'statut' => $data['statut'] ?? 'PLANIFIE'
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM evenements WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function countAll(): int
    {
        return $this->pdo->query("SELECT COUNT(*) FROM evenements")->fetchColumn();
    }
}
