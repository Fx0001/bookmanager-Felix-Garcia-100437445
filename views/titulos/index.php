<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/Titulo.php';

$db = (new Database())->getConnection();
$tituloModel = new Titulo($db);
$titulos = $tituloModel->getAll();

include __DIR__ . '/../../includes/header.php';
?>

<h1 class="h3 mb-4 text-gray-800">Títulos</h1>

<a href="crear.php" class="btn btn-primary mb-3">Nuevo título</a>

<div class="card shadow mb-4">
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th><th>Título</th><th>ISBN</th><th>Editorial</th>
                    <th>Precio</th><th>Stock</th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($titulos as $t): ?>
                <tr>
                    <td><?= $t['id_titulo'] ?></td>
                    <td><?= htmlspecialchars($t['titulo']) ?></td>
                    <td><?= htmlspecialchars($t['isbn'] ?? '') ?></td>
                    <td><?= htmlspecialchars($t['publicador'] ?? '—') ?></td>
                    <td>RD$ <?= number_format($t['precio'], 2) ?></td>
                    <td><?= $t['stock'] ?></td>
                    <td>
                        <a href="editar.php?id=<?= $t['id_titulo'] ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="eliminar.php?id=<?= $t['id_titulo'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>