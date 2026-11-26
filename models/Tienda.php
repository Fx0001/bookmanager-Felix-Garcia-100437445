<?php

class Tienda
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAll()
    {
        $stmt = $this->db->prepare("SELECT * FROM tiendas");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM tiendas WHERE id_tienda = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($datos)
    {
        $sql = "INSERT INTO tiendas (nombre, direccion, telefono, correo, estado)
                VALUES (:nombre, :direccion, :telefono, :correo, :estado)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':nombre'    => $datos['nombre'],
            ':direccion' => $datos['direccion'],
            ':telefono'  => $datos['telefono'],
            ':correo'    => $datos['correo'],
            ':estado'    => $datos['estado'] ?? 1,
        ]);
    }

    public function update($id, $datos)
    {
    $sql = "UPDATE tiendas
            SET nombre = :nombre,
                direccion = :direccion,
                telefono = :telefono,
                correo = :correo
            WHERE id_tienda = :id";
    $stmt = $this->db->prepare($sql);
    return $stmt->execute([
        ':nombre'    => $datos['nombre'],
        ':direccion' => $datos['direccion'],
        ':telefono'  => $datos['telefono'],
        ':correo'    => $datos['correo'],
        ':id'        => $id,
    ]);
}

public function delete($id)
{
    $stmt = $this->db->prepare("DELETE FROM tiendas WHERE id_tienda = :id");
    return $stmt->execute([':id' => $id]);
}

public function ConteoTiendas(): int
    {
        $stmt = $this->db->prepare("SELECT COUNT(*) AS total FROM tiendas");
        $stmt->execute();

        return (int) $stmt->fetchColumn();
    }

    // public function update($id, $datos) { ... }   <- UPDATE ... WHERE id_tienda = :id
    // public function delete($id) { ... }           <- DELETE ... WHERE id_tienda = :id
}