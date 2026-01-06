<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class Payment extends Model {
    protected $table = 'payments';

    public function getTotalDonations() {
        return $this->pdo->query("SELECT SUM(amount) FROM {$this->table} WHERE type='DONATION'")->fetchColumn() ?: 0;
    }
}
