<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class Beneficiary extends Model
{
    protected $table = 'beneficiaries';

    public function getAll()
    {
        return $this->query("
            SELECT b.*, v.first_name as v_first, v.last_name as v_last 
            FROM beneficiaries b 
            LEFT JOIN volunteers v ON b.assigned_volunteer_id = v.id 
            ORDER BY b.created_at DESC
        ")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $sql = "INSERT INTO beneficiaries (first_name, last_name, email, phone, needs, notes, assigned_volunteer_id) VALUES (?, ?, ?, ?, ?, ?, ?)";
        return $this->query($sql, [
            $data['first_name'],
            $data['last_name'],
            $data['email'],
            $data['phone'],
            $data['needs'],
            $data['notes'],
            $data['assigned_volunteer_id'] ?: null
        ]);
    }

    public function update($id, $data)
    {
        $sql = "UPDATE beneficiaries SET first_name = ?, last_name = ?, email = ?, phone = ?, needs = ?, notes = ?, assigned_volunteer_id = ? WHERE id = ?";
        return $this->query($sql, [
            $data['first_name'],
            $data['last_name'],
            $data['email'],
            $data['phone'],
            $data['needs'],
            $data['notes'],
            $data['assigned_volunteer_id'] ?: null,
            $id
        ]);
    }
}
