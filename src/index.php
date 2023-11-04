<?php 
session_start();

if($_SESSION['status'] == 'valid'){
    echo "<script>location.href = '/banksystem/src/home.php'</script>";
}

?>
<!DOCTYPE html> 
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="main.css">
    <script src="bootstrap.bundle.min.js"></script>
    <title>Login/Register - Bank Management System</title>
</head>
<body class="bg-dark text-white">
<div class="main_container continer-xl d-grid ">
    <div class="login_container container-fluid px-5 py-2">
        <form action="#" class="d-grid" id="login">
            <h2 class="text-center py-4">LOG IN</h2>
            <input class="m-2 p-2 rounded" type="text" placeholder="Username or Email" id="username">
            <input class="m-2 p-2 rounded" type="password" placeholder="Password" id="password">
            <input class="m-2 btn btn-secondary" type="submit" value="Log In" id="loginBtn">
            <input type="hidden" name="hiddenUser" id="hiddenUser" value=''>
            <p>Don't have an account? <a href="#" id="reg">Register</a></p>
        </form>
        <form action="#" class="d-none" id="register">
            <h2 class="text-center py-4">REGISTER</h2>
            <input class="m-2 p-2 rounded" type="text" placeholder="Username or Email" id="reg_username">
            <input class="m-2 p-2 rounded" type="password" placeholder="Password" id="reg_password">
            <input class="m-2 p-2 rounded" type="password" placeholder="Retype-Password" id="re_reg_password">
            <input class="m-2 btn btn-secondary" type="submit" value="Register" id="registerBtn">
            <p>Have an account already? <a href="#" id="log">Log In</a></p>
        </form>
            <input type="hidden" name="hidden" id="hidden">
    </div>
</div>

<script src="jquery.js"></script>
<script src="main.js"></script>
</body>
</html>