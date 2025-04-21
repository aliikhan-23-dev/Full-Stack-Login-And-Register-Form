<?php
session_start();
require_once("start.php");
if (isset($_POST["register"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"],'DEFAULT_PASSWORD');
    $role = $_POST['role'];
    $checkEmail = $conn->query('SELECT email FROM users_db WHERE email = $email');
    if( $checkEmail->num_rows > 0){
        $_SESSION['register-form'] = 'Email is already registered';
        $_SESSION['active-form'] = 'Error';
    }else{
        $conn->query("INSERT INTO users_db (name,email,password,role) VALUES('$name', '$email', '$password', '$role')");
    }
    header('location:index.php');
    exit;
}
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = $conn->query('SELECT * FROM users_db WHERE email = $email');
    if( $result->num_rows > 0){
        $result = $user->fetch_assoc();
        if(password_verify($password,$user['password']));
    $_SESSION['name'] = $user['name'];
    $_SESSION['email'] = $user['email'];
    if($user['role'] == 'login'){
        header("Location: admin-page.php");
    }else{
        header("Location: user-page.php");
    }
    exit();
}
}
$_SESSION['login-form'] = 'Incorrect email or password';
$_SESSION['active-form'] = 'login';
header("Location: index.php");
exit();





$servername = "localhost";
$username = "root";
$password = "";
$databasename = "users_db";

$conn = new mysqli($servername, $username, $password, $databasename);
if ($conn->connect_error) {
    die("Connection Failed". $conn->connect_error);
}
?>