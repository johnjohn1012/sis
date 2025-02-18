<?php
// Start the session to access session variables
session_start();

// Create a function to check if the session variable 'MEMBER_ID' is set
function logged_in() {
    return isset($_SESSION['MEMBER_ID']);
}

// This function will redirect to login page if the user is not logged in
function confirm_logged_in() {
    if (!logged_in()) {
        echo '<script type="text/javascript">
                window.location = "..login/login.php";
              </script>';
        exit();
    }
}

// Function to check user role
function check_user_role() {
    if (logged_in()) {
        // Assuming you have a database connection in place
        require '../includes/connection.php'; // Modify path as needed
        
        // Query to get the user type from the database
        $query = 'SELECT t.TYPE FROM users u 
                  JOIN type t ON t.TYPE_ID = u.TYPE_ID 
                  WHERE u.ID = ?';
        
        // Prepare and execute the query
        $stmt = $db->prepare($query);
        $stmt->bind_param('i', $_SESSION['MEMBER_ID']);
        $stmt->execute();
        $stmt->bind_result($userType);
        $stmt->fetch();
        $stmt->close();

        // If the user type is 'User', redirect them to POS page
        if ($userType === 'User') {
            echo '<script>alert("Restricted Page! You will be redirected to POS"); window.location = "pos.php";</script>';
            exit();
        }

        // Optionally, store the user type in the session for further use
        $_SESSION['USER_TYPE'] = $userType;
    }
}
?>
