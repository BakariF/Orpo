<?php
/* session_unset(); */
/* $user = new profil();
    $userInfo = $user->getUserProfile(); */
/* 
    session_start();
include '../config.php';
    $user = new user();
    $userInfo = $user->getUserInfo(); */
//je supprime le profil avec avoir cliquer sur supprimer et valider sur une modale
$true = true;
if (isset($_POST['deleteUser'])) {
    if (isset($_POST['modalDelete'])) {
        
        $user = new user();
        $deleteUser = $user->deleteProfile();
            header("Location: /Accueil");
            exit();
        }
    }
