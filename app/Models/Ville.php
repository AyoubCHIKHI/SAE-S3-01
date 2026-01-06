<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class Ville extends Model
{
    protected $table = 'Ville';

    public function getAll()
    {
        return $this->query("SELECT * FROM {$this->table} ORDER BY nom_ville ASC")->fetchAll(PDO::FETCH_ASSOC);
    }
}
