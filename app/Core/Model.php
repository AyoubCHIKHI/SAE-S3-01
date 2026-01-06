<?php
namespace App\Core;

class Model {
    protected $pdo;
    protected $table;

    public function __construct() {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function query($sql, $params = []) {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }

    public function find($id) {
        if ($this->table) {
            return $this->query("SELECT * FROM {$this->table} WHERE id = ?", [$id])->fetch(\PDO::FETCH_ASSOC);
        }
        return null;
    }

    public function delete($id) {
        if ($this->table) {
            return $this->query("DELETE FROM {$this->table} WHERE id = ?", [$id]);
        }
        return false;
    }

    public function countAll() {
        if ($this->table) {
            return $this->pdo->query("SELECT COUNT(*) FROM {$this->table}")->fetchColumn();
        }
        return 0;
    }
}
