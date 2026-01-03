<?php

require_once __DIR__ . '/../db.php';

class Payment
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = getPDO();
    }

    public function getAll(): array
    {
        $sql = "SELECT p.*, b.nom as benevole_nom, b.prenom as benevole_prenom 
                FROM payments p 
                LEFT JOIN benevoles b ON p.benevole_id = b.id 
                ORDER BY payment_date DESC";
        return $this->pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(array $data): bool
    {
        $sql = "INSERT INTO payments (benevole_id, amount, payment_date, type, method, notes, recorded_by) 
                VALUES (:benevole_id, :amount, :payment_date, :type, :method, :notes, :recorded_by)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'benevole_id' => !empty($data['benevole_id']) ? $data['benevole_id'] : null,
            'amount' => $data['amount'],
            'payment_date' => $data['payment_date'],
            'type' => $data['type'],
            'method' => $data['method'],
            'notes' => $data['notes'] ?? null,
            'recorded_by' => $data['recorded_by'] ?? null
        ]);
    }

    public function getTotalDonations(): float
    {
        $stmt = $this->pdo->query("SELECT SUM(amount) FROM payments WHERE type = 'DONATION'");
        return (float) $stmt->fetchColumn();
    }
}
