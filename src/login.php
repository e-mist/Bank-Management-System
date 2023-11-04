<?php
require('connection.php');
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$_SESSION['getPass'] = $password;
$_SESSION['username'] = $username;

$findUser = "SELECT * FROM `users` WHERE `Username` = '$username' AND `Password` = '$password'";
$findUserConn = mysqli_query($conn, $findUser);

if(mysqli_num_rows($findUserConn) > 0){
    $user = mysqli_fetch_assoc($findUserConn);      

    $_SESSION['status'] = 'valid';

    $result = array(
        "data" => $_SESSION['user'] = $user,
        "status" => 'valid'
    );
    
    echo json_encode($result);
    
}else{
    $_SESSION['status'] = 'invalid';

    $result = array(
        "data" => '',
        "status" => 'invalid'
    );

    echo json_encode($result);

}

?>