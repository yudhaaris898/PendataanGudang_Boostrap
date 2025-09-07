<?php
$usernamelogin = 'admin';
$passswordlogin = 'passwordlogin';

session_start();
$username = $_POST['username'];
$password = $_POST['password'];

if ($username == $usernamelogin && $password == $passswordlogin) {
    session_start();
    $_SESSION['username'] = $username;
    header("Location:index.php");
}
else{
    header("Location:login.php");
}
session_destroy();
?>
