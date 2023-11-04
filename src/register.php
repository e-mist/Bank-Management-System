<?php
require('connection.php');
$regUsername = $_POST['reg_username'];
$regPassword = $_POST['reg_password'];
$retypePassword = $_POST['retypePassword'];

$regUser = "INSERT INTO `users`(`Username`, `Password`) VALUES ('$regUsername','$regPassword')";

$findUser = "SELECT * FROM `users` WHERE `Username` = '$regUsername' AND `Password` = '$regPassword'";
$findUserConn = mysqli_query($conn, $findUser);

if(mysqli_num_rows($findUserConn) > 0){
    echo "User Already Taken! Please try again.";
}else{
    if($regPassword == $retypePassword){
        mysqli_query($conn, $regUser);

        echo "Register Successfully.";
    }
}
?>