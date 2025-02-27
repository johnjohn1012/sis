<?php
  require('session.php');
  confirm_logged_in();
?>



<?php include('includes/connection.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <style type="text/css">
    /* Sidebar Brand */
    /* Hover effect on sidebar items */
    .nav-item:hover {
      background-color: rgba(54, 190, 24, 0.5);
      cursor: pointer;
      transition: background-color 0.2s ease;
    }

    #overlay {
      position: fixed;
      display: none;
      width: 100%;
      height: 100%;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0,0,0,0.5);
      z-index: 2;
      cursor: pointer;
    }

    #text {
      position: absolute;
      top: 50%;
      left: 50%;
      font-size: 50px;
      color: white;
      transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
    }
  </style>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Harah Rubina Del Dios Sales and Inventory System</title>
  <link rel="icon" href="assets/img/logos.png" type="image/gif" sizes="16x16">

  <!-- Custom fonts for this template-->
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="assets/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar structure -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar" style="width: 100px;">

      <!-- Sidebar Brand -->
      <a class="sidebar-brand d-flex align-items-center" href="index.php" style="display: flex; flex-direction: row; gap: 40px;">
        <!-- Logo -->
        <div class="sidebar-brand-icon">
          <img src="assets/img/logos.png" alt="Brand Logo" style="width: 76px; height: 76px;">
        </div>

        <!-- Text -->
        <div class="sidebar-brand-text" style="display: flex; align-items: center; font-size: larger; font-weight: bold; white-space: nowrap;">
          Harah Rubina Del Dios SIS
        </div>
      </a>
      <br>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">
      <br>

      <div class="sidebar-heading">
  HOME
</div>

<li class="nav-item">
  <a class="nav-link" href="index.php">
    <i class="fas fa-fw fa-home"></i>
    <span>Dashboard</span>
  </a>
</li>

<hr class="sidebar-divider">

<div class="sidebar-heading">
  MASTER LIST
</div>



<li class="nav-item">
  <a class="nav-link" href="pos.php">
    <i class="fas fa-fw fa-cash-register"></i>
    <span>POS</span>
  </a>
</li>


<li class="nav-item">
  <a class="nav-link" href="customers.php">
    <i class="fas fa-fw fa-users"></i>
    <span>Customers</span>
  </a>
</li>




<li class="nav-item">
  <a class="nav-link" href="products.php">
    <i class="fas fa-fw fa-cogs"></i>
    <span>Products</span>
  </a>
</li>




<li class="nav-item">
  <a class="nav-link" href="orders.php">
    <i class="fas fa-fw fa-box"></i>
    <span>Orders</span>
  </a>
</li>





<li class="nav-item">
  <a class="nav-link" href="payments.php">
    <i class="fas fa-fw fa-credit-card"></i>
    <span>Payments</span>
  </a>
</li>

<li class="nav-item">
  <a class="nav-link" href="transaction.php">
    <i class="fas fa-fw fa-exchange-alt"></i>
    <span>Transaction </span>
  </a>
</li>




<li class="nav-item">
  <a class="nav-link" href="receipts.php">
    <i class="fas fa-fw fa-file-invoice"></i>
    <span>Receipts</span>
  </a>
</li>



<div class="sidebar-heading">
  REPORTING
</div>

<li class="nav-item">
  <a class="nav-link" href="report_orders.php">
    <i class="fas fa-fw fa-chart-line"></i>
    <span>Orders Report</span>
  </a>
</li>

<li class="nav-item">
  <a class="nav-link" href="report_payments.php">
    <i class="fas fa-fw fa-chart-pie"></i>
    <span>Payments Report</span>
  </a>
</li>

<li class="nav-item">
  <a class="nav-link" href="transaction.php">
    <i class="fas fa-fw fa-exchange-alt"></i>
    <span>Transaction Report</span>
  </a>
</li>

<hr class="sidebar-divider">



      <!-- Sidebar Toggler -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>

    <!-- End of Sidebar -->
    <?php include_once 'topbar.php'; ?>



        <!-- Inside includes/header.php or a similar file -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
  // Prevent right-click and F12 shortcuts
 /* document.addEventListener("contextmenu", function (e) {
    e.preventDefault();
  });

  document.addEventListener("keydown", function (e) {
    if (e.key === "F12" || (e.ctrlKey && e.shiftKey && (e.key === "I" || e.key === "i"))) {
      e.preventDefault();
      Swal.fire({
        icon: 'warning',
        title: 'Access Denied',
        text: 'This page is protected from inspection.',
        confirmButtonText: 'OK'
      });
    }
  });  

  */
</script>
