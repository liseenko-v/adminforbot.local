<?php
require_once __DIR__.'/boot.php';

checkIfNotAuth();

if (isset($_SESSION['user']) && $_SESSION['user'] != '') {
    unset($_SESSION['user']);
    header('location: index.php');
    die(-1);
}