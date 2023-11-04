<?php
require('connection.php');

$getUserMoney = "SELECT * FROM users";
$sqlgetUserMoney = mysqli_query($conn, $getUserMoney);

$row = mysqli_fetch_object($result);

$_SESSION['usermoney'] = $row;
?>