<?php
  require('../../login/session.php');
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
         <br>
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
        <a class="nav-link" href="../dashboard/index.php">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <div class="sidebar-heading">
        MASTER LIST
    </div>

    <!-- Individual links with icons -->
    <?php
        // Switch to handle active pages dynamically
        $currentPage = isset($_GET['page']) ? $_GET['page'] : '';

        switch ($currentPage) {
            case 'purchase_order':
                $activePO = 'active';
                break;
            case 'receiving':
                $activeReceiving = 'active';
                break;
            case 'back_order':
                $activeBackOrder = 'active';
                break;
            case 'return_list':
                $activeReturnList = 'active';
                break;
            case 'stock':
                $activeStock = 'active';
                break;
            case 'sale_list':
                $activeSaleList = 'active';
                break;
            case 'supplier':
                $activeSupplier = 'active';
                break;
            case 'item_list':
                $activeItemList = 'active';
                break;
            case 'user_list':
                $activeUserList = 'active';
                break;
        
        }
    ?>

    <li class="nav-item <?php echo isset($activePO) ? $activePO : ''; ?>">
        <a class="nav-link" href="../purchase_order/index.php?page=purchase_order">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Purchase Order</span>
        </a>
    </li>
    <li class="nav-item <?php echo isset($activeReceiving) ? $activeReceiving : ''; ?>">
        <a class="nav-link" href="../receiving/index.php?page=receiving">
            <i class="fas fa-fw fa-box-open"></i>
            <span>Receiving</span>
        </a>
    </li>
    <li class="nav-item <?php echo isset($activeBackOrder) ? $activeBackOrder : ''; ?>">
        <a class="nav-link" href="../back_order/index.php?page=back_order">
            <i class="fas fa-fw fa-reply"></i>
            <span>Back Order</span>
        </a>
    </li>
    <li class="nav-item <?php echo isset($activeReturnList) ? $activeReturnList : ''; ?>">
        <a class="nav-link" href="../return/index.php?page=return_list">
            <i class="fas fa-fw fa-undo"></i>
            <span>Return List</span>
        </a>
    </li>
    <li class="nav-item <?php echo isset($activeStock) ? $activeStock : ''; ?>">
        <a class="nav-link" href="../stocks/index.php?page=stock">
            <i class="fas fa-fw fa-cogs"></i>
            <span>Stocks</span>
        </a>
    </li>
    <li class="nav-item <?php echo isset($activeSaleList) ? $activeSaleList : ''; ?>">
        <a class="nav-link" href="../sales/index.php?page=sale_list">
            <i class="fas fa-fw fa-tags"></i>
            <span>Sale List</span>
        </a>
    </li>
    <li class="nav-item <?php echo isset($activeSupplier) ? $activeSupplier : ''; ?>">
        <a class="nav-link" href="../maintenance/supplier.php?page=supplier">
            <i class="fas fa-fw fa-truck"></i>
            <span>Supplier List</span>
        </a>
    </li>
    <li class="nav-item <?php echo isset($activeItemList) ? $activeItemList : ''; ?>">
    <a class="nav-link" href="../maintenance/item.php?page=supplier">
            <i class="fas fa-fw fa-box"></i>
            <span>Item List</span>
        </a>
    </li>


    <hr class="sidebar-divider d-none d-md-block">

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
  }); */
</script>
