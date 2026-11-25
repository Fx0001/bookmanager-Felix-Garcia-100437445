<?php

class Titulo
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function getAll()
    {
        $sql = "SELECT t.*, p.nombre AS publicador
                FROM titulos t
                LEFT JOIN publicadores p ON t.id_publicador = p.id_publicador
                ORDER BY t.id_titulo";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM titulos WHERE id_titulo = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getPublicadores()
    {
        $stmt = $this->db->prepare("SELECT id_publicador, nombre FROM publicadores ORDER BY nombre");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($d)
    {
        $sql = "INSERT INTO titulos (titulo, isbn, descripcion, id_publicador, precio, stock, fecha_publicacion, estado)
                VALUES (:titulo, :isbn, :descripcion, :id_publicador, :precio, :stock, :fecha_publicacion, 1)";
        return $this->db->prepare($sql)->execute($this->params($d));
    }

    public function update($id, $d)
    {
        $sql = "UPDATE titulos
                SET titulo = :titulo, isbn = :isbn, descripcion = :descripcion,
                    id_publicador = :id_publicador, precio = :precio,
                    stock = :stock, fecha_publicacion = :fecha_publicacion
                WHERE id_titulo = :id";
        $p = $this->params($d);
        $p[':id'] = $id;
        return $this->db->prepare($sql)->execute($p);
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("DELETE FROM titulos WHERE id_titulo = :id");
        return $stmt->execute([':id' => $id]);
    }

    // Convierte el POST en datos limpios; los vacíos opcionales pasan a NULL
    public function limpiar($post)
    {
        $v    = fn($k) => trim($post[$k] ?? '');
        $nulo = fn($x) => $x === '' ? null : $x;

        return [
            'titulo'            => $v('titulo'),
            'isbn'              => $nulo($v('isbn')),
            'descripcion'       => $nulo($v('descripcion')),
            'id_publicador'     => $nulo($v('id_publicador')),
            'precio'            => $v('precio'),
            'stock'             => $v('stock'),
            'fecha_publicacion' => $nulo($v('fecha_publicacion')),
        ];
    }

    // Devuelve una lista de errores (vacía si todo está bien)
    public function validar($d)
    {
        $e = [];
        if ($d['titulo'] === '') {
            $e[] = 'El título es obligatorio.';
        }
        if (!is_numeric($d['precio']) || $d['precio'] < 0) {
            $e[] = 'El precio debe ser un número no negativo.';
        }
        if (filter_var($d['stock'], FILTER_VALIDATE_INT) === false || $d['stock'] < 0) {
            $e[] = 'El stock debe ser un entero no negativo.';
        }
        return $e;
    }

    private function params($d)
    {
        return [
            ':titulo'            => $d['titulo'],
            ':isbn'              => $d['isbn'],
            ':descripcion'       => $d['descripcion'],
            ':id_publicador'     => $d['id_publicador'],
            ':precio'            => $d['precio'],
            ':stock'             => $d['stock'],
            ':fecha_publicacion' => $d['fecha_publicacion'],
        ];
    }
}