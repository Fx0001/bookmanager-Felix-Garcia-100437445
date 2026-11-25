<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/Titulo.php';

$db = (new Database())->getConnection();
$tituloModel = new Titulo($db);
$publicadores = $tituloModel->getPublicadores();

$errores = [];
$titulo = ['titulo' => '', 'isbn' => '', 'descripcion' => '', 'id_publicador' => '',
           'precio' => '0', 'stock' => '0', 'fecha_publicacion' => ''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $datos = $tituloModel->limpiar($_POST);
    $titulo = $datos;
    $errores = $tituloModel->validar($datos);

    if (empty($errores)) {
        try {
            $tituloModel->create($datos);
            header('Location: index.php');
            exit;
        } catch (PDOException $e) {
            $errores[] = ($e->getCode() == 23000)
                ? 'Ese ISBN ya existe o la editorial no es válida.'
                : 'No se pudo guardar el título.';
        }
    }
}

include __DIR__ . '/../../includes/header.php';
?>

<h1 class="h3 mb-4 text-gray-800">Nuevo título</h1>

<?php foreach ($errores as $e): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($e) ?></div>
<?php endforeach; ?>

<div class="card shadow mb-4">
    <div class="card-body">
        <?php $textoBoton = 'Guardar'; include __DIR__ . '/_form.php'; ?>
    </div>
</div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>