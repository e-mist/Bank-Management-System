<?php
session_start();
require('connection.php');

$currentPass = $_POST['current_pass'];
$newPass = $_POST['new_pass'];

$user = $_SESSION['username'];

$sqlUpdPass = "UPDATE `users` SET `Password`='$newPass' WHERE `Username` = '$user' AND `Password` = '$currentPass'";
mysqli_query($conn,$sqlUpdPass);

echo "Goods";

?>