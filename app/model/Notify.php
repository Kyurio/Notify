<?php

namespace app\model;

require_once __DIR__ . '/../database/database.php';

use app\database\Database;
use PDOException;
use Exception;
use PDO;

class Notify
{
    protected $db;
    protected $table = 'gastos';

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAll()
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM $this->table ORDER BY ID DESC");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            // Manejar la excepción
            throw new Exception("Error al obtener todos los registros: " . $e->getMessage());
        }
    }

    public function getById($id)
    {
        try {
            $stmt = $this->db->prepare("SELECT id_usuario, COUNT(*) AS num_rutas_pendientes FROM rutas_visitas WHERE estado_ruta <> 1 AND DATEDIFF(CURDATE(), fecha) >= 3 AND id_usuario = :id GROUP BY id_usuario");
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result; 
        } catch (PDOException $e) {
            // Manejar la excepción
            throw new Exception("Error al obtener registro por ID: " . $e->getMessage());
        }
    }


    
}
