
<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "voting";

// Connect to the database
$connect = mysqli_connect($host, $username, $password, $database);

// Check connection
if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    echo "Connected successfully";
}
?>
