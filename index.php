<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Sales and Inventory System</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700&display=swap" rel="stylesheet">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<style>
    body {
        background: url('img/bg-harah.jpg') no-repeat center center fixed;
        background-size: cover;
        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .card {
        width: 100%;
        max-width: 600px;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background: rgba(255, 255, 255, 0.92);
    }

    .card-header {
        background: #007bff;
        color: #fff;
        text-align: center;
        border-radius: 15px 15px 0 0;
    }

    .card-body {
        padding: 40px;
        text-align: center;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        padding: 12px 30px;
        font-size: 16px;
        border-radius: 25px;
        margin-top: 20px;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        box-shadow: 0 0 20px #007bff;
    }

    .card-footer {
        text-align: center;
        padding: 20px;
        background: transparent;
    }
</style>

<body>
    <div class="container" style="display: flex; justify-content: center; align-items: center; height: 100vh;">
        <div class="card">
            <div class="card-header">
                <h3>Welcome to Harah Rubina Del Dios Sales and Inventory System</h3>
            </div>
            <div class="card-body">
                <h1 style="font-weight: 700; color: #333;">Manage Your Sales with Ease</h1>
                <p class="lead" style="font-size: 1.25rem; color: #666;">Our system helps you track inventory, process sales, and more efficiently manage your business.</p>
                <a href="login/login.php" class="btn btn-primary" id="loginBtn">Login to Get Started</a>
            </div>
            <div class="card-footer">
                <p>Designed for smooth user experience and efficient workflow.</p>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Login button click event with SweetAlert2 confirmation
        document.getElementById('loginBtn').addEventListener('click', function (e) {
            e.preventDefault();  // Prevent default link behavior

            Swal.fire({
                title: 'Proceed to login page?',
                text: 'Thank you!',
                icon: 'success',
                confirmButtonText: 'OK',
                allowOutsideClick: false,
                willClose: () => {
                    // Apply rotation and fade-out effect before redirect
                    document.body.style.transition = "transform 1s ease-in-out, opacity 1s ease-out";
                    document.body.style.transform = "rotate(360deg)";  // Rotate 360 degrees
                    document.body.style.opacity = "0";  // Fade out the page

                    setTimeout(() => {
                        window.location.href = 'login/login.php';  // Redirect after the transition
                    }, 900); // Wait for 1 second (matching the duration of the rotation and fade-out)
                }
            });
        });
    </script>

<script>
    // Prevent right-click and F12 shortcuts
    document.addEventListener("contextmenu", function (e) {
      e.preventDefault();
    });

    document.addEventListener("keydown", function (e) {
      if (e.key === "F12" || (e.ctrlKey && e.shiftKey && (e.key === "I" || e.key === "i"))) {
        e.preventDefault();
        // Use SweetAlert2 instead of alert
        Swal.fire({
          icon: 'warning',
          title: 'Access Denied',
          text: 'This page is protected from inspection.',
          confirmButtonText: 'OK'
        });
      }
    });
  </script>



</body>

</html>
