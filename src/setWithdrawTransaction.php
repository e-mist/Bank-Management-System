<?php
session_start();
require('newconnection.php');

$setWithdraw = $_POST['withdraw'];
$setAction = $_POST['action'];

$user_data = $_SESSION['username'];

$create = "CREATE TABLE IF NOT EXISTS transaction_$user_data (
    Action VARCHAR(255),
    Amount INT(255),
    Date DATETIME DEFAULT CURRENT_TIMESTAMP
  )";

mysqli_query($conn, $create);

$insert_sql = "INSERT INTO `transaction_$user_data`(`Action`, `Amount`) VALUES ('$setAction','$setWithdraw')";


if($setWithdraw <= 0){

}else{
    mysqli_query($conn, $insert_sql);
}



?>