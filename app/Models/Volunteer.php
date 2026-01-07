<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class Volunteer extends Model
{
    protected $table = 'volunteers';

    public function getAll()
    {
        return $this->query("SELECT * FROM {$this->table} ORDER BY created_at DESC")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $sql = "INSERT INTO volunteers (first_name, last_name, birth_date, email, phone, city, profession, skills, dietary_requirements, physical_limitations, past_missions, availability) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        return $this->query($sql, [
            $data['first_name'],
            $data['last_name'],
            $data['birth_date'],
            $data['email'],
            $data['phone'],
            $data['city'],
            $data['profession'],
            $data['skills'],
            $data['dietary_requirements'],
            $data['physical_limitations'],
            $data['past_missions'],
            $data['availability']
        ]);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE volunteers SET first_name = ?, last_name = ?, birth_date = ?, email = ?, phone = ?, city = ?, profession = ?, skills = ?, dietary_requirements = ?, physical_limitations = ?, past_missions = ?, availability = ? WHERE id = ?";
        return $this->query($sql, [
            $data['first_name'],
            $data['last_name'],
            $data['birth_date'],
            $data['email'],
            $data['phone'],
            $data['city'],
            $data['profession'],
            $data['skills'],
            $data['dietary_requirements'],
            $data['physical_limitations'],
            $data['past_missions'],
            $data['availability'],
            $id
        ]);
    }
}
