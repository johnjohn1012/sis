<?php require('session.php'); ?>




<?php if(logged_in()){ ?>
    <script type="text/javascript">
        window.location = "index.php";
    </script>
<?php } ?>




<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>HRDD Sales And Inventory</title>
  <link rel="shortcut icon" href="../img/logos.png" type="image/x-icon">

  <!-- Custom fonts for this template-->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <style>
    body {
      background: url('../img/bg-harah.jpg') no-repeat center center fixed;
      background-size: cover;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }
    
    .card {
      width: 100%;
      max-width: 800px;
      border-radius: 15px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card-body {
      padding: 30px;
    }

    .text-center h1 {
      color: #fff;
      margin-bottom: 20px;
    }

    .form-control-user {
      border-radius: 20px;
      padding: 15px;
      margin-bottom: 10px;
    }

    .btn-user {
      border-radius: 20px;
      padding: 10px;
      font-size: 18px;
    }

    .custom-control-label {
      font-size: 14px;
      color: #fff;
    }

    .card-header {
      background-color: transparent;
      border-bottom: none;
      padding-bottom: 0;
    }
  </style>

</head>

<body>

  <div class="container">

    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <div class="row shadow">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Welcome to Harah Rubina Del Dios Sales and Inventory!</h1>
                  </div>
                  <form class="user" role="form" action="processlogin.php" method="post">
                        <div class="form-group">
                            <input class="form-control form-control-user" placeholder="Username" name="user" type="text" id="username" autofocus>
                        </div>
                        <div class="form-group">
                            <input class="form-control form-control-user" placeholder="Password" name="password" type="password" id="password">
                        </div>
                        <div class="form-group" style="display: flex; align-items: center; gap: 8px; font-size: 19px; color: #333; flex-direction: row;">
                               <label for="showPassword" style="cursor: pointer; font-weight: 500; margin-bottom: 0;">Show Password</label>
                              <input type="checkbox" id="showPassword" style="width: 20px; height: 20px; cursor: pointer;">
                   
                          </div>

                        <br>
                        <div class="d-flex justify-content-between">
                                  <button class="btn btn-secondary btn-user w-50 me-2" type="button" id="clearFields">Clear Fields</button>
                                  <button class="btn btn-primary btn-user w-50" type="submit" name="btnlogin">Login</button>
                              </div>



                        <hr>
                    </form>






                    <!-- <div class="text-center">
                      <a class="small" href="register.php">Create an Account!</a>
                    </div> -->
                



                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>
  <script>
    document.getElementById('showPassword').addEventListener('change', function () {
        let passwordField = document.getElementById('password');
        passwordField.type = this.checked ? 'text' : 'password';
    });

    document.getElementById('clearFields').addEventListener('click', function () {
        document.getElementById('username').value = '';
        document.getElementById('password').value = '';
    });
</script>
  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

</body>

</html>




