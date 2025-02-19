<?php


// 2. Unset all the session variables
unset($_SESSION['MEMBER_ID']);
unset($_SESSION['FIRST_NAME']);
unset($_SESSION['LAST_NAME']);
unset($_SESSION['GENDER']);
unset($_SESSION['EMAIL']);
unset($_SESSION['PHONE_NUMBER']);
unset($_SESSION['JOB_TITLE']);
unset($_SESSION['PROVINCE']);
unset($_SESSION['CITY']);
unset($_SESSION['TYPE']);
unset($_SESSION['pointofsale']);
?>

<!-- SweetAlert2 Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    // SweetAlert for successful logout
    Swal.fire({
        title: 'Logged Out!',
        text: 'You have successfully logged out.',
        icon: 'success',
        confirmButtonText: 'OK'
    }).then(function() {
        // Redirect to login page after confirmation
        window.location = "../login/login.php";
    });
</script>
