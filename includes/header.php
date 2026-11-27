<?php if (!defined('BASE_URL')) define('BASE_URL', '/'); ?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BookManager</title>

    <!-- Custom fonts for this template-->
    <link href="<?= BASE_URL ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
   <link href="<?= BASE_URL ?>assets/sb-admin-2.min.css" rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="<?= BASE_URL ?>assets/i.svg">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= BASE_URL ?>index.php">
        <div class="sidebar-brand-icon"><i class="fas fa-book"></i></div>
        <div class="sidebar-brand-text mx-3">BookManager</div>
    </a>

    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="<?= BASE_URL ?>index.php"><i class="fas fa-fw fa-home"></i><span>Inicio</span></a>
    </li>

      <!-- Divider -->
            <hr class="sidebar-divider">


    <li class="nav-item">
        <a class="nav-link" href="<?= BASE_URL ?>views/tiendas/index.php"><i class="fas fa-fw fa-store"></i><span>Tiendas</span></a>
    </li>

      <!-- Divider -->
            <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link" href="<?= BASE_URL ?>views/titulos/index.php"><i class="fas fa-fw fa-book"></i><span>Títulos</span></a>
    </li>

      <!-- Divider -->
            <hr class="sidebar-divider">


    <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-address-book"></i>
                    <span>Contactos</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header mt-1">Correos:</h6>
                        <a class="collapse-item" >felixjesusga0@gmail.com</a>
                        <a class="collapse-item" >Correo@servidor.com</a>
                        <h6 class="collapse-header mt-3">Telefonos:</h6>
                        <a class="collapse-item" >809-xxx-xxxx</a>
                        <a class="collapse-item" >829-xxx-xxxx</a>
                    </div>
                </div>
            </li>

    <hr class="sidebar-divider d-none d-md-block">
    
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>

       <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">