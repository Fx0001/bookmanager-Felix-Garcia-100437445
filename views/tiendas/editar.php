<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/Tienda.php';

$db = (new Database())->getConnection();
$tiendaModel = new Tienda($db);

$id = $_GET['id'] ?? null;
$tienda = $id ? $tiendaModel->getById($id) : false;

if (!$tienda) {
    header('Location: index.php');
    exit;
}

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos = [
        'nombre'    => trim($_POST['nombre'] ?? ''),
        'direccion' => trim($_POST['direccion'] ?? ''),
        'telefono'  => trim($_POST['telefono'] ?? ''),
        'correo'    => trim($_POST['correo'] ?? ''),
        'estado'    => 1,
    ];

    if ($datos['nombre'] === '') {
        $errores[] = 'El nombre de la tienda es obligatorio.';
    }

    if (empty($errores)) {
        $tiendaModel->update($id, $datos);
        header('Location: index.php');
        exit;
    }

    $tienda = array_merge($tienda, $datos); // conserva lo escrito si hay error
}

include __DIR__ . '/../../includes/header.php';
?>

<h1 class="h3 mb-4 text-gray-800">Editar tienda</h1>

<!-- Mensajes de error: igual que en crear.php -->

<div class="card shadow mb-4">
    <div class="card-body">
        <form method="POST">
            <div class="form-group">
                <label>Nombre:</label>
                <input type="text" name="nombre" class="form-control" placeholder="Ej. Librería Central"
                       value="<?= htmlspecialchars($tienda['nombre']) ?>">
            </div>
            <div class="form-group">
    <label>Dirección:</label>
    <input type="text" name="direccion" class="form-control" placeholder="Ej. Av. Duarte #123, Santo Domingo"
           value="<?= htmlspecialchars($tienda['direccion'] ?? '') ?>">
            
            </div>
            <div class="form-group">
                <label>Teléfono:</label>
                <input type="text" name="telefono" class="form-control" maxlength="12" placeholder="8X9-XXX-XXXX"
                       value="<?= htmlspecialchars($tienda['telefono'] ?? '') ?>">
            
            </div>
            <div class="form-group">
                <label>Correo:</label>
                <input type="email" name="correo" class="form-control" placeholder="Usuario@servidor.com"
           value="<?= htmlspecialchars($tienda['correo'] ?? '') ?>">
            </div>
            
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>