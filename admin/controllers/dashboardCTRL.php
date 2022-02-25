<?php
include '../../config.php';
session_start();
if ($_SESSION['profile']['id_g5e1d_roles'] == 2) {
    header("Location: /accueil");
    exit();
}
$user = new admin();
$usersList = $user->getNewUsers();
