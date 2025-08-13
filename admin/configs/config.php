<?php
$servername = 'localhost'; // Database Server Name
$username = 'root'; // Database Username
$password = ''; // Database Password
$dbname = 'nexdrop'; //Database Name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn -> connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}
?>
