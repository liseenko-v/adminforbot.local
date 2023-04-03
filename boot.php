<?php
require_once __DIR__.'/xyz/config.php';

session_start();

function checkIfAuth()
{
    if (isset($_SESSION['user']) && $_SESSION['user'] != '') {    
        header('Location: index.php');
        die(-1);
    }
}

function checkIfNotAuth()
{
    if (!isset($_SESSION['user']) || $_SESSION['user'] == '') {    
        header('Location: login.php');
        die(-1);
    }
}

function pdo()
{
    static $pdo;

    if (!$pdo) {
        include __DIR__.'/xyz/config.php';
        // Подключение к БД
        $dsn = 'mysql:dbname='.$config['db_name'].';host='.$config['db_host'];
        $pdo = new PDO($dsn, $config['db_user'], $config['db_pass']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    return $pdo;
}

function generatePage($page, $data_p) {
    $data = $data_p;    
    include_once('templates/header.php');
    include_once('templates/'.$page.'.php');
    include_once('templates/footer.php');
}