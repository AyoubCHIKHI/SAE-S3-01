<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class Mission extends Model
{
    protected $table = 'missions';

    public function getAll()
    {
        return $this->query("SELECT * FROM {$this->table} ORDER BY start_date DESC")->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public function getUpcoming($limit = 5)
    {
        return $this->query("SELECT * FROM {$this->table} WHERE start_date >= NOW() ORDER BY start_date ASC LIMIT $limit")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $sql = "INSERT INTO missions (title, description, category, location, start_date, end_date, expected_volunteers, responsible_person, equipment_needed, specific_tasks) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        return $this->query($sql, [
            $data['title'],
            $data['description'],
            $data['category'],
            $data['location'],
            $data['start_date'],
            $data['end_date'],
            $data['expected_volunteers'],
            $data['responsible_person'],
            $data['equipment_needed'],
            $data['specific_tasks']
        ]);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE missions SET title = ?, description = ?, category = ?, location = ?, start_date = ?, end_date = ?, expected_volunteers = ?, responsible_person = ?, equipment_needed = ?, specific_tasks = ? WHERE id = ?";
        return $this->query($sql, [
            $data['title'],
            $data['description'],
            $data['category'],
            $data['location'],
            $data['start_date'],
            $data['end_date'],
            $data['expected_volunteers'],
            $data['responsible_person'],
            $data['equipment_needed'],
            $data['specific_tasks'],
            $id
        ]);
    }
}
