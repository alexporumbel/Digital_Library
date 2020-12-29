<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Digital Library - Admin</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/plugins/fontawesome-free/css/all.min.css'); ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css'); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/plugins/select2/css/select2.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/admin/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css'); ?>">
    <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url('assets/admin/plugins/toastr/toastr.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/admin/dist/css/adminlte.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css'); ?>">
  <link rel="stylesheet" href="<?= base_url('assets/admin/plugins/datatables-bs4/css/responsive.bootstrap4.min.css'); ?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
     
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user-alt"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-sm-right">
          <a href="<?= base_url('admin/logout'); ?>" class="dropdown-item">
            Iesi din cont
          </a>
        </div>
      </li>
      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="<?= base_url('assets/admin/dist/img/AdminLTELogo.png'); ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Library Admin</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url('assets/admin/dist/img/user2-160x160.jpg'); ?>" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><?=$_SESSION['admin_name'];?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item active">
            <a href="<?= base_url('admin/home'); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Tablou de bord
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Depozit Publicatii
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              
              <li class="nav-item">
                <a href="<?= base_url('admin/adauga-publicatie'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Adauga Publicatie</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/management-publicatii'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Lista Publicatii</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="<?= base_url('admin/solicitari-publicatii'); ?>" class="nav-link">
              <i class="nav-icon fas fa-bell"></i>
              <p>
                Solicitari Publicatii
                <span class="right badge badge-danger">1</span>
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tag"></i>
              <p>
                Categorii
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/management-discipline'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Management discipline</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/management-categorii'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Management categorii</p>
                </a>
              </li>
            </ul>
          </li>
          
          <li class="nav-item has-treeview <?= $unconfirmedcount >0 ? 'menu-open': '';?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                Studenti
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/management-studenti'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Management studenti</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/studenti-neconfirmati'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Studenti neconfirmati</p>
                  <?php if($unconfirmedcount > 0) {
                  echo "<span class='right badge badge-danger'>$unconfirmedcount</span>";
                  } ?>
                </a>
              </li>
            </ul>
          </li>
           <li class="nav-item">
            <a href="<?= base_url('admin/home'); ?>" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Statistici
              </p>
            </a>
          </li>
          
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Setari
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?= base_url('admin/setari-generale'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Generale</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?= base_url('admin/management-staff'); ?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Conturi Staff</p>
                </a>
              </li>
            </ul>
          </li>
          
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>