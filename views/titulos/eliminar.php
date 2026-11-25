<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/Titulo.php';

$db = (new Database())->getConnection();
$tituloModel = new Titulo($db);

$id = $_GET['id'] ?? null;
$titulo = $id ? $tituloModel->getById($id) : false;

if (!$titulo) {
    header('Location: index.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $tituloModel->delete($id);
        header('Location: index.php');
        exit;
    } catch (PDOException $e) {
        $error = 'No se puede eliminar: este título tiene ventas asociadas.';
    }
}

include __DIR__ . '/../../includes/header.php';
?>

<h1 class="h3 mb-4 text-gray-800">Eliminar título</h1>

<?php if ($error): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
<?php endif; ?>

<div class="card shadow mb-4">
    <div class="card-body">
        <p>¿Seguro que quieres eliminar el título
           <strong><?= htmlspecialchars($titulo['titulo']) ?></strong>?
           Esta acción no se puede deshacer.</p>

        <form method="POST">
            <button type="submit" class="btn btn-danger">Sí, eliminar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>