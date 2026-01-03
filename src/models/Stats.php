<?php

require_once __DIR__ . '/../db.php';
require_once __DIR__ . '/Benevole.php';
require_once __DIR__ . '/Payment.php';
require_once __DIR__ . '/Evenement.php';

class Stats
{
    private $pdo;
    private $benevoleModel;
    private $paymentModel;
    private $evenementModel;

    public function __construct()
    {
        $this->pdo = getPDO();
        $this->benevoleModel = new Benevole();
        $this->paymentModel = new Payment();
        $this->evenementModel = new Evenement();
    }

    public function getKeyMetrics(): array
    {
        return [
            'total_benevoles' => $this->benevoleModel->countAll(),
            'total_donations' => $this->paymentModel->getTotalDonations(),
            'total_events' => $this->evenementModel->countAll(),
            'total_members' => 3000 // Mocked goal from user request or realistic data if available
        ];
    }

    public function getBenevoleGrowth(): array
    {
        // Monthly growth of volunteers (mock query or real if timestamp exists)
        // Assuming we group by month of creation
        $sql = "SELECT DATE_FORMAT(date_creation, '%Y-%m') as month, COUNT(*) as count 
                FROM benevoles 
                GROUP BY month 
                ORDER BY month ASC LIMIT 12";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getDonationTrends(): array
    {
         $sql = "SELECT DATE_FORMAT(payment_date, '%Y-%m') as month, SUM(amount) as total 
                 FROM payments 
                 WHERE type='DONATION' 
                 GROUP BY month 
                 ORDER BY month ASC LIMIT 12";
         $stmt = $this->pdo->query($sql);
         return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
