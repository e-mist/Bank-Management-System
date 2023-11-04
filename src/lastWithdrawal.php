<?php
require('connection.php');
session_start();

$userMoney = $_SESSION['user']['User_Money'];

echo $userMoney;
?>