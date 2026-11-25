<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/Titulo.php';

$db = (new Database())->getConnection();
$tituloModel = new Titulo($db);
$publicadores = $tituloModel->getPublicadores();

$id = $_GET['id'] ?? null;
$titulo = $id ? $tituloModel->getById($id) : false;

if (!$titulo) {
    header('Location: index.php');
    exit;
}

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos = $tituloModel->limpiar($_POST);
    $titulo = array_merge($titulo, $datos);
    $errores = $tituloModel->validar($datos);

    if (empty($errores)) {
        try {
            $tituloModel->update($id, $datos);
            header('Location: index.php');
            exit;
        } catch (PDOException $e) {
            $errores[] = ($e->getCode() == 23000)
                ? 'Ese ISBN ya existe o la editorial no es válida.'
                : 'No se pudo actualizar el título.';
        }
    }
}

include __DIR__ . '/../../includes/header.php';
?>

<h1 class="h3 mb-4 text-gray-800">Editar título</h1>

<?php foreach ($errores as $e): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($e) ?></div>
<?php endforeach; ?>

<div class="card shadow mb-4">
    <div class="card-body">
        <?php $textoBoton = 'Actualizar'; include __DIR__ . '/_form.php'; ?>
    </div>
</div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>