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

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tiendaModel->delete($id);
    header('Location: index.php');
    exit;
}

include __DIR__ . '/../../includes/header.php';
?>

<h1 class="h3 mb-4 text-gray-800">Eliminar tienda</h1>

<div class="card shadow mb-4">
    <div class="card-body">
        <p>¿Seguro que quieres eliminar la tienda
           <strong><?= htmlspecialchars($tienda['nombre']) ?></strong>?
           Esta acción no se puede deshacer.</p>

        <form method="POST">
            <button type="submit" class="btn btn-danger">Sí, eliminar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>