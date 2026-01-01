<?php

require_once __DIR__ . '/../db.php';

class Partenaire
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = getPDO();
    }

    public function getAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM partenaires ORDER BY nom ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById(int $id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM partenaires WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(array $data): bool
    {
        $sql = "INSERT INTO partenaires (nom, type, contact_nom, contact_email, contact_telephone, est_grand_donateur) 
                VALUES (:nom, :type, :contact_nom, :contact_email, :contact_telephone, :est_grand_donateur)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'nom' => $data['nom'],
            'type' => $data['type'],
            'contact_nom' => $data['contact_nom'] ?? null,
            'contact_email' => $data['contact_email'] ?? null,
            'contact_telephone' => $data['contact_telephone'] ?? null,
            'est_grand_donateur' => $data['est_grand_donateur'] ?? 0
        ]);
    }

    public function update(int $id, array $data): bool
    {
        $sql = "UPDATE partenaires SET 
                nom = :nom, 
                type = :type, 
                contact_nom = :contact_nom, 
                contact_email = :contact_email, 
                contact_telephone = :contact_telephone, 
                est_grand_donateur = :est_grand_donateur
                WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'id' => $id,
            'nom' => $data['nom'],
            'type' => $data['type'],
            'contact_nom' => $data['contact_nom'] ?? null,
            'contact_email' => $data['contact_email'] ?? null,
            'contact_telephone' => $data['contact_telephone'] ?? null,
            'est_grand_donateur' => $data['est_grand_donateur'] ?? 0
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM partenaires WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function countAll(): int
    {
        return $this->pdo->query("SELECT COUNT(*) FROM partenaires")->fetchColumn();
    }
}
