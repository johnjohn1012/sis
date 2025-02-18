<?php
  require('../session.php');
  confirm_logged_in();
?>
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
  <link rel="icon" href="../../img/logos.png" type="image/gif" sizes="16x16">

  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
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
          <img src="../../img/logos.png" alt="Brand Logo" style="width: 76px; height: 76px;">
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

          
               <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-archive"></i>
          <span>Pos & Orders</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: calc(86% + 30px); min-width: 180px;">
    
          <a class="dropdown-item" href="pos.php">Pos</a>
          <a class="dropdown-item" href="transaction.php">Order</a>
          
        </div>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-archive"></i>
          <span>Customers & Employee</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: calc(86% + 30px); min-width: 180px;">
    
          <a class="dropdown-item" href="dashboard.php">Customers</a>
          <a class="dropdown-item" href="item_list.php">Employee</a>
          
        </div>
      </li>

    


                 <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-archive"></i>
          <span>Sales & Transactions</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: calc(86% + 30px); min-width: 180px;">
    
          <a class="dropdown-item" href="dashboard.php">Sales</a>
          <a class="dropdown-item" href="item_list.php">Transactions</a>
          
        </div>
      </li>


      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-archive"></i>
          <span>Stock Inventory</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: calc(86% + 30px); min-width: 180px;">
    
     
            <a class="dropdown-item" href="cashier/purchase_order.php">Purchase Order</a>
            <a class="dropdown-item" href="receiving.php">Receiving</a>
            <a class="dropdown-item" href="back_order.php">Back Order</a>
            <a class="dropdown-item" href="return_list.php">Return List</a>
            <a class="dropdown-item" href="stock.php">Stocks</a>
            <a class="dropdown-item" href="sale_list.php">Sale List</a>
            <a class="dropdown-item" href="supplier_list.php">Supplier List</a>
            <a class="dropdown-item" href="item_list.php">Item List</a>
            <a class="dropdown-item" href="user_list.php">User List</a>
           
        </div>
      </li>

      <hr class="sidebar-divider d-none d-md-block">

      <!-- Maintenance Section -->
      <div class="sidebar-heading">
        MAINTENANCE
      </div>
      <li class="nav-item">
        <a class="nav-link" href="user.php">
          <i class="fas fa-fw fa-users"></i>
          <span>Accounts</span>
        </a>
      </li>

      <!-- Sidebar Toggler -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>

    <!-- End of Sidebar -->
    <?php include_once 'topbar.php'; ?>
