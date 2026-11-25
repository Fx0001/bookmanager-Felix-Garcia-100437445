<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/Tienda.php';

$db = (new Database())->getConnection();
$tiendaModel = new Tienda($db);

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
        $tiendaModel->create($datos);
        header('Location: index.php');
        exit;
    }
}

include __DIR__ . '/../../includes/header.php';
?>

<h1 class="h3 mb-4 text-gray-800">Nueva tienda</h1>

<?php foreach ($errores as $e): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($e) ?></div>
<?php endforeach; ?>

<div class="card shadow mb-4">
    <div class="card-body">
        <form method="POST">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control"
                       value="<?= htmlspecialchars($_POST['nombre'] ?? '') ?>">
            </div>
            <!-- direccion, telefono y correo: mismo patrón que nombre -->

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>