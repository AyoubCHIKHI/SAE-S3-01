<?php

require_once __DIR__ . '/../db.php';

class Benevole
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = getPDO();
    }

    public function getAll(): array
    {
        $stmt = $this->pdo->query("SELECT * FROM benevoles ORDER BY date_creation DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById(int $id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM benevoles WHERE id = :id");
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(array $data): bool
    {
        $sql = "INSERT INTO benevoles (nom, prenom, email, telephone, ville, date_naissance, profession, regime_alimentaire, restrictions_sante, infos_diversite) 
                VALUES (:nom, :prenom, :email, :telephone, :ville, :date_naissance, :profession, :regime_alimentaire, :restrictions_sante, :infos_diversite)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'telephone' => $data['telephone'] ?? null,
            'ville' => $data['ville'] ?? null,
            'date_naissance' => $data['date_naissance'] ?? null,
            'profession' => $data['profession'] ?? null,
            'regime_alimentaire' => $data['regime_alimentaire'] ?? null,
            'restrictions_sante' => $data['restrictions_sante'] ?? null,
            'infos_diversite' => $data['infos_diversite'] ?? null
        ]);
    }

    public function update(int $id, array $data): bool
    {
        $sql = "UPDATE benevoles SET 
                nom = :nom, 
                prenom = :prenom, 
                email = :email, 
                telephone = :telephone, 
                ville = :ville, 
                date_naissance = :date_naissance, 
                profession = :profession, 
                regime_alimentaire = :regime_alimentaire, 
                restrictions_sante = :restrictions_sante, 
                infos_diversite = :infos_diversite
                WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'id' => $id,
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'telephone' => $data['telephone'] ?? null,
            'ville' => $data['ville'] ?? null,
            'date_naissance' => $data['date_naissance'] ?? null,
            'profession' => $data['profession'] ?? null,
            'regime_alimentaire' => $data['regime_alimentaire'] ?? null,
            'restrictions_sante' => $data['restrictions_sante'] ?? null,
            'infos_diversite' => $data['infos_diversite'] ?? null
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM benevoles WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }

    public function countAll(): int
    {
        return $this->pdo->query("SELECT COUNT(*) FROM benevoles")->fetchColumn();
    }
}
