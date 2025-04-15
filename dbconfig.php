<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "22b112_aarzu";

try {
    $con = mysqli_connect($servername, $username, $password, $dbname);
    if (!$con) {
        echo "<script>alert('Database Not Connected " . mysqli_connect_error() . "')</script>";
    }
} catch (Exception $err) {
    echo "<script>alert('Server Error.')</script>";
}
?>