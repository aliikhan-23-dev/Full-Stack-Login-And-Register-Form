<?php
session_start();
$errors = [
    'login' => $_SESSION['login_error'] ?? '',
    'register' => $_SESSION['register_error'] ?? ''
];
$activeForm = $_SESSION['active_form']??'login';


session_unset();
function showError($error){
    return !empty($error) ?"<p class='error-message'>$error</p>":'';
}
function isActiveForm($formName,$activeForm){
    return $formName === $activeForm? 'active': '';
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full-Stack Login And Register Form</title>
    <link rel="stylesheet" href="start.css">
</head>
<body>
    <div class="conatainer">
        <div class="form-box-active" <? isActiveForm('login',$activeForm);?> id="login-form">
            <form action="login-register-form" method="post">
                <h2>Login</h2>
                <?= showError($errors['login']);?>
                <input type="text" name="email" placeholder="E-mail" required>
                <input type="password" name="password" placeholder="Password" required>
                <button type="submit" name="button">Login</button>
                <p>Don't have an account? <a href="#" onclick="showForm('register-form')">Register</a></p>
            </form>
            <div class="form-box" <? isActiveForm('register',$activeForm);?> id="login-form">
            <form action="login-register-form" method="post">
                <h2>Register</h2>
                <?= showError($errors['register']);?>
                <input type="text" name="email" placeholder="E-mail" required>
                <input type="password" name="password" placeholder="Password" required>
                <select name="value" required>
                    <option value="select">--Select-Option</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
                <button type="submit" name="button">Register</button>
                <p>Already have an account? <a href="#" onclick="showForm('login-form')">Login</a></p>
            </form>
        </div>
    </div>
    <script src="start.js"></script>
</body>
</html>