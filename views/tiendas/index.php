<?php
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/Tienda.php';

$db = (new Database())->getConnection();
$tiendaModel = new Tienda($db);
$tiendas = $tiendaModel->getAll();

include __DIR__ . '/../../includes/header.php';
?>

<h1 class="h3 mb-4 text-gray-800">Tiendas</h1>

<a href="crear.php" class="btn btn-primary mb-3">Nueva tienda</a>

<div class="card shadow mb-4">
    <div class="card-body">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th><th>Nombre</th><th>Dirección</th>
                    <th>Teléfono</th><th>Correo</th><th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tiendas as $t): ?>
                <tr>
                    <td><?= $t['id_tienda'] ?></td>
                    <td><?= htmlspecialchars($t['nombre']) ?></td>
                    <!-- dirección, teléfono y correo: igual que nombre -->
                    <td>
                        <a href="editar.php?id=<?= $t['id_tienda'] ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="eliminar.php?id=<?= $t['id_tienda'] ?>" class="btn btn-danger btn-sm">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include __DIR__ . '/../../includes/footer.php'; ?>