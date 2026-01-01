<?php

require_once __DIR__ . '/../db.php';

class User
{
    private $pdo;

    public function __construct()
    {
        $this->pdo = getPDO();
    }

    public function getAll(): array
    {
        $stmt = $this->pdo->query("SELECT id, first_name, last_name, email, role FROM users WHERE is_active = 1 ORDER BY last_name ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
