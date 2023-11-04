<?php
session_start();
$_SESSION['status'] = $_POST['logout'];

echo $_SESSION['username'];
?>