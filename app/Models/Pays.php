<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class Pays extends Model
{
    protected $table = 'Pays';

    public function getAll()
    {
        return $this->query("SELECT * FROM {$this->table} ORDER BY nom_pays ASC")->fetchAll(PDO::FETCH_ASSOC);
    }
}
