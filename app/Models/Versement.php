<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class Versement extends Model
{
    protected $table = 'VERSEMENT';

    public function getTotalDonations()
    {
        $result = $this->query("SELECT SUM(CAST(montant AS DECIMAL(10,2))) as total FROM {$this->table}")->fetch(PDO::FETCH_ASSOC);
        return $result['total'] ?? 0;
    }
}
