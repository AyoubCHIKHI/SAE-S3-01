<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class Pays extends Model
{
    protected $table = 'pays';

    public function getAll()
    {
        return $this->query("SELECT * FROM {$this->table} ORDER BY nom ASC")->fetchAll(PDO::FETCH_ASSOC);
    }
}
