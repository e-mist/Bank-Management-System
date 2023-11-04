<?php
require('connection.php');
session_start();

$withdraw = $_POST['withdraw'];

$encode_user = json_encode($_SESSION['user']['Username']);
$decode_user = json_decode($encode_user);
$encode_pass = json_encode($_SESSION['user']['Password']);
$decode_pass = json_decode($encode_pass);

$userMoney = $_SESSION['user']['User_Money'];

$updMoney = $userMoney - $withdraw;

$userMoneyUpd = "UPDATE `users` SET `User_Money`='$updMoney' WHERE `Username`='$decode_user' AND `Password`='$decode_pass'";

if($withdraw <= 0){

}else if($userMoney >= $withdraw){
    mysqli_query($conn, $userMoneyUpd);
}

$findUser = "SELECT * FROM `users` WHERE `Username` = '$decode_user' AND `Password` = '$decode_pass'";
$findUserConn = mysqli_query($conn, $findUser);

if(mysqli_num_rows($findUserConn) > 0){
    $userUpd = mysqli_fetch_assoc($findUserConn);
    
    $result = array(
        "data" => $_SESSION['user'] = $userUpd,
        "status" => 'valid'
    );
    
    echo json_encode($result);
    
}


?>