<?php
session_start();
require('newconnection.php');

$user_data = $_SESSION['username'];

$get_sql = "SELECT * FROM transaction_$user_data ";
$resGet = mysqli_query($conn, $get_sql);

$row = $resGet -> fetch_all(MYSQLI_ASSOC);

echo json_encode($row);
?>