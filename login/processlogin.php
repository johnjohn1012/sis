<?php
require('../includes/connection.php');
require('../login/session.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<?php
if (isset($_POST['btnlogin'])) {
    $users = trim($_POST['user']);
    $upass = trim($_POST['password']);
    $h_upass = sha1($upass);

    if ($upass == '') {
        echo "<script>alert('Password is missing!'); window.location = 'login.php';</script>";
        exit();
    } else {
        // SQL query to get user details
        $sql = "SELECT ID, e.FIRST_NAME, e.LAST_NAME, e.GENDER, e.EMAIL, e.PHONE_NUMBER, 
                       j.JOB_TITLE, l.PROVINCE, l.CITY, t.TYPE
                FROM  `users` u
                JOIN `employee` e ON e.EMPLOYEE_ID = u.EMPLOYEE_ID
                JOIN `location` l ON e.LOCATION_ID = l.LOCATION_ID
                JOIN `job` j ON e.JOB_ID = j.JOB_ID
                JOIN `type` t ON t.TYPE_ID = u.TYPE_ID
                WHERE `USERNAME` = ? AND `PASSWORD` = ?";

        // Prepare statement
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $users, $h_upass);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            $found_user = $result->fetch_assoc();

            // Store session variables
            $_SESSION['MEMBER_ID'] = $found_user['ID']; 
            $_SESSION['FIRST_NAME'] = $found_user['FIRST_NAME']; 
            $_SESSION['LAST_NAME'] = $found_user['LAST_NAME'];  
            $_SESSION['GENDER'] = $found_user['GENDER'];
            $_SESSION['EMAIL'] = $found_user['EMAIL'];
            $_SESSION['PHONE_NUMBER'] = $found_user['PHONE_NUMBER'];
            $_SESSION['JOB_TITLE'] = $found_user['JOB_TITLE'];
            $_SESSION['PROVINCE'] = $found_user['PROVINCE']; 
            $_SESSION['CITY'] = $found_user['CITY']; 
            $_SESSION['TYPE'] = $found_user['TYPE'];

            // Redirect users based on their TYPE with SweetAlert message
            if ($_SESSION['TYPE'] == 'Admin') {
                echo "<script>
                        Swal.fire({
                            title: 'Login Successful!',
                            text: 'Welcome Admin!',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(function() {
                            window.location = 'http://localhost/sis/admin/index.php';
                        });
                      </script>";
                exit();

            } elseif ($_SESSION['TYPE'] == 'stockclerk') {
                echo "<script>
                        Swal.fire({
                            title: 'Login Successful!',
                            text: 'Welcome Stock Clerk!',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(function() {
                            window.location = 'http://localhost/sis/stock_clerk/dashboard/index.php';
                        });
                      </script>";
                exit();

            } elseif ($_SESSION['TYPE'] == 'cashier') {
                echo "<script>
                        Swal.fire({
                            title: 'Login Successful!',
                            text: 'Welcome Cashier!',
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then(function() {
                            window.location = 'http://localhost/sis/cashier/pos.php';
                        });
                      </script>";
                exit();
            } else {
                header("Location: ../login/login.php"); // Default for other users
                exit();
            }
        } else {
            echo "<script>alert('Username or Password Not Registered! Contact your administrator.'); window.location = 'login.php';</script>";
            exit();
        }
    }
}
$conn->close();
$stmt->close();
?>

</body>
</html>
