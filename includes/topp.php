<?php
  require_once('../login/session.php');
  confirm_logged_in();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <style type="text/css">
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
#text{
  position: absolute;
  top: 50%;
  left: 50%;
  font-size: 50px;
  color: white;
  transform: translate(-50%,-50%);
  -ms-transform: translate(-50%,-50%);
  text-decoration: none;
  
}

.sidebar-brand-text:hover {
    text-shadow: 0px 0px 8px rgba(255, 255, 255, 0.7);
    text-decoration: none;
}
</style>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Harah Rubina Del Dios Sales and Inventory System</title>
  <link rel="icon" href="../img/logos.png" type="image/gif" sizes="16x16">

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <link rel="stylesheet" href="cart.css" />
</head>



<body id="page-top">
          
  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-primary topbar mb-4 static-top shadow">
        <!-- Your content here -->

        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
            <img src="../img/logos.png" alt="Brand Logo" style="width: 76px; height: 76px;">
        </div>
          
        <div class="sidebar-brand-text mx-4" style="text-align: center; width: 100%; font-weight: bold; color: white;">
            Harah Rubina Del Dios Sales & Inventory System
        </div>


             

      </a>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

          <!--  <li class="nav-item dropdown no-arrow">
              <a class="nav-link" href="pos.php" role="button">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">POS</span>
              </a>
            </li> -->

 

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="mr-2 d-none d-lg-inline small" style="color: white; font-weight: bold;">
              <?php echo $_SESSION['FIRST_NAME']. ' '.$_SESSION['LAST_NAME']; ?>
              </span>

                <img class="img-profile rounded-circle"
                <?php
                  if($_SESSION['GENDER']=='Male'){
                    echo 'src="../img/boy.png"';
                  }else{
                    echo 'src="../img/girl.png"';
                  }
                ?>>

              </a>

              <?php 

                $query = 'SELECT ID, FIRST_NAME,LAST_NAME,USERNAME,PASSWORD, t.TYPE
                          FROM users u
                          JOIN employee e ON e.EMPLOYEE_ID=u.EMPLOYEE_ID
                          JOIN type t ON t.TYPE_ID=u.TYPE_ID';
                $result = mysqli_query($db, $query) or die (mysqli_error($db));
      
                while ($row = mysqli_fetch_assoc($result)) {
                          $a = $_SESSION['MEMBER_ID'];
                          $bbb = $_SESSION['TYPE'];
                }
                          
            ?>

              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <button class="dropdown-item" onclick="on()">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </button>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#settingsModal" data-href="settings.php?action=edit & id='<?php echo $a; ?>'">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
          
        <!-- Begin Page Content -->
        <div class="container-fluid">