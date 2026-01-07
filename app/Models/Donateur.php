<?php

namespace App\Models;

use App\Utils\Database;
use PDO;

class Donateur
{
    protected $pdo;

    public function __construct()
    {
        $this->pdo = Database::getConnection();
    }

    public function create(array $data)
    {
        $sql = "INSERT INTO donateurs (prenom, nom, email, telephone, message, montant, date) VALUES (:prenom, :nom, :email, :telephone, :message, :montant, NOW())";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':prenom' => $data['prenom'],
            ':nom' => $data['nom'],
            ':email' => $data['email'],
            ':telephone' => $data['telephone'],
            ':message' => $data['message'],
            ':montant' => $data['montant']
        ]);
        return $this->pdo->lastInsertId();
    }
}
