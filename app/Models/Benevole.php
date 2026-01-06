<?php
namespace App\Models;

use App\Core\Model;
use PDO;

class Benevole extends Model
{
    protected $table = 'Bénévole';

    public function getAll()
    {
        return $this->query("
            SELECT b.*, c.email, c.téléphone as telephone, v.nom_ville, e.nom_ as nom_evenement 
            FROM Bénévole b
            LEFT JOIN Coordonnée c ON b.Id_Bénévole = c.Id_Bénévole
            LEFT JOIN Ville v ON b.id_ville = v.id_ville
            LEFT JOIN evenement e ON b.id_evenement = e.id_evenement
            ORDER BY b.Id_Bénévole DESC
        ")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRecent($limit = 5)
    {
        $limit = (int) $limit;
        return $this->query("
            SELECT b.*, c.email, c.téléphone as telephone, v.nom_ville
            FROM Bénévole b
            LEFT JOIN Coordonnée c ON b.Id_Bénévole = c.Id_Bénévole
            LEFT JOIN Ville v ON b.id_ville = v.id_ville
            ORDER BY b.Id_Bénévole DESC 
            LIMIT $limit
        ")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data)
    {
        $this->pdo->beginTransaction();
        try {
            // Insert into Bénévole
            $stmt = $this->pdo->prepare("INSERT INTO Bénévole (Nom, prenom, age, OrigineGéo, id_evenement, id_ville) VALUES (?, ?, ?, ?, ?, ?)");
            $stmt->execute([
                $data['nom'],
                $data['prenom'],
                $data['age'] ?? null,
                $data['origine'] ?? null,
                $data['id_evenement'],
                $data['id_ville']
            ]);
            $id = $this->pdo->lastInsertId();

            // Insert into Coordonnée
            // Generate distinct ID for coordonnée
            $id_coord = uniqid('coord_');
            $stmt2 = $this->pdo->prepare("INSERT INTO Coordonnée (id_coordonné, email, téléphone, Id_Bénévole) VALUES (?, ?, ?, ?)");
            $stmt2->execute([
                $id_coord,
                $data['email'],
                $data['telephone'] ?? null,
                $id
            ]);

            $this->pdo->commit();
            return true;
        } catch (\Exception $e) {
            $this->pdo->rollBack();
            // Log error or rethrow
            return false;
        }
    }

    public function update($id, $data)
    {
        $this->pdo->beginTransaction();
        try {
            $stmt = $this->pdo->prepare("UPDATE Bénévole SET Nom = ?, prenom = ?, age = ?, OrigineGéo = ?, id_evenement = ?, id_ville = ? WHERE Id_Bénévole = ?");
            $stmt->execute([
                $data['nom'],
                $data['prenom'],
                $data['age'] ?? null,
                $data['origine'] ?? null,
                $data['id_evenement'],
                $data['id_ville'],
                $id
            ]);

            $stmt2 = $this->pdo->prepare("UPDATE Coordonnée SET email = ?, téléphone = ? WHERE Id_Bénévole = ?");
            $stmt2->execute([
                $data['email'],
                $data['telephone'] ?? null,
                $id
            ]);

            $this->pdo->commit();
            return true;
        } catch (\Exception $e) {
            $this->pdo->rollBack();
            return false;
        }
    }

    public function find($id)
    {
        $stmt = $this->pdo->prepare("
            SELECT b.*, c.email, c.téléphone as telephone, v.nom_ville, e.nom_ as nom_evenement 
            FROM Bénévole b
            LEFT JOIN Coordonnée c ON b.Id_Bénévole = c.Id_Bénévole
            LEFT JOIN Ville v ON b.id_ville = v.id_ville
            LEFT JOIN evenement e ON b.id_evenement = e.id_evenement
            WHERE b.Id_Bénévole = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function delete($id)
    {
        $this->pdo->beginTransaction();
        try {
            // Delete coordonnée first
            $stmt = $this->pdo->prepare("DELETE FROM Coordonnée WHERE Id_Bénévole = ?");
            $stmt->execute([$id]);

            // Delete benevole
            $stmt2 = $this->pdo->prepare("DELETE FROM Bénévole WHERE Id_Bénévole = ?");
            $stmt2->execute([$id]);

            $this->pdo->commit();
            return true;
        } catch (\Exception $e) {
            $this->pdo->rollBack();
            return false;
        }
    }
}
