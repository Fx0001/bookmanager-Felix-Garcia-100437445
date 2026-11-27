<?php
require_once __DIR__ . '/config/database.php';
require_once __DIR__ . '/models/Tienda.php';
require_once __DIR__ . '/models/Titulo.php';

$database = new Database();
$db = $database->getConnection();

$tiendaModel = new Tienda($db);
$totalTiendas = $tiendaModel->ConteoTiendas();

$tituloModel = new Titulo($db);
$totalTitulos = $tituloModel->ConteoTitulos();

include __DIR__ . '/includes/header.php';
?>

<!-- Título de la página -->
<h1 class="h3 mb-4 text-gray-800">Inicio</h1>

<!-- Bienvenida -->
<div class="row">
    <div class="col-12 mb-4">
        <div class="card shadow">
            <div class="card-body">
                <h5 class="font-weight-bold text-primary">Bienvenido a BookManager</h5>
                <p class="mb-0">
                    Sistema de gestión de librería. Desde aquí puedes administrar
                    la red de tiendas y el inventario de títulos.
                </p>
            </div>
        </div>
    </div>
</div>

<!-- Accesos rápidos -->
<div class="row">
    <div class="col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Módulo</div>
                        <div class="h5 mb-3 font-weight-bold text-gray-800">Tiendas</div>
                        <a href="views/tiendas/index.php" class="btn btn-primary btn-sm">Ir a Tiendas</a>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-store fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Módulo</div>
                        <div class="h5 mb-3 font-weight-bold text-gray-800">Títulos</div>
                        <a href="views/titulos/index.php" class="btn btn-success btn-sm">Ir a Títulos</a>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-book fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Métricas / Conteos -->
<div class="row">
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Cantidad de tiendas actualmente:
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <span> <?php echo htmlspecialchars((string) ($totalTiendas ?? 0), ENT_QUOTES, 'UTF-8'); ?>
                            </span>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-store fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Cantidad de titulos actualmente:
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            <span><?php echo htmlspecialchars((string) ($totalTitulos ?? 0), ENT_QUOTES, 'UTF-8'); ?>
                            </span>
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-book fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/includes/footer.php'; ?>