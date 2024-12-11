<?php
session_start();
include("connect.php");

// Get data from POST request
$mobile = $_POST['mobile'];
$password = $_POST['password'];
$role = $_POST['role'];

// Check if user exists
$check = mysqli_query($connect, "SELECT * FROM user WHERE mobile='$mobile' AND password='$password' AND role='$role' ");


if (mysqli_num_rows($check) > 0) {
    $userdata = mysqli_fetch_array($check); // Corrected function name
    
    $groups = mysqli_query($connect, "SELECT * FROM user WHERE role=2"); // Fixed query syntax
    $groupsdata = mysqli_fetch_all($groups, MYSQLI_ASSOC); // Fetch all data with proper argument

    $_SESSION['userdata'] = $userdata; 
    $_SESSION['groupsdata'] = $groupsdata; 

    echo '
    <script>
        window.location = "../routes/dashboard.php";
    </script>';
} 
else {
    echo '
        <script>
            alert("Invalid Credentials or User not found");
            window.location = "../"; 
        </script>
        ';
}
?>