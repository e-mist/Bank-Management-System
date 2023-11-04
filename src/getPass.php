<?php
session_start();

$password = $_SESSION['getPass'];

echo $password;
?>