<?php
require_once __DIR__.'/boot.php';

checkIfAuth();

$data['error'] = '';
if (isset($_POST['submit'])) {
    $login = trim($_POST['login']);
    $pass = trim($_POST['pass']);
    if ($login == $config['login'] && password_verify($pass, $config['pass_hash'])) {
        $_SESSION['user'] = $login;        
        header('Location: index.php');        
    } else {
        $data['error'] = 'Неправильные логин или пароль. Попробуйте ввести еще раз.';
    }
}

generatePage('login', $data);