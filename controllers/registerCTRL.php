<?php
//Page validée le 01/03
session_start();
$formErrors = array();
$form = false;
include '../config.php';
if (isset($_REQUEST['fieldValue'])) {
    include '../models/user.php';
    $regexname = '/^[a-zA-Z]{0,50}+$/';

    $user = new user();

    if (!empty($_REQUEST['fieldValue'])) {
        if ($_REQUEST['fieldName'] == 'mail') {
            if (filter_var($_REQUEST['fieldValue'], FILTER_VALIDATE_EMAIL)) {
                $user->mail = htmlspecialchars($_REQUEST['fieldValue']);
                echo $user->checkIfUserExist('mail');
            }
        } else if ($_REQUEST['fieldName'] == 'name') {
            if (!empty($_REQUEST['fieldValue'])) {
                if (preg_match($regexname, $_REQUEST['fieldValue'])) {
                    $user->name = htmlspecialchars($_REQUEST['fieldValue']);
                    echo $user->checkIfUserExist('name');
                }
            }
        }
    }
} else {
    
    if (isset($_POST['register'])) {
        $form = true;
        $regexname = '/^[a-zA-Z]{0,50}+$/';
        $user = new user();
        $salt = 'Mugabeisabadperson';
        if (!empty($_POST['name'])) {
            if (preg_match($regexname, $_POST['name'])) {
                $user->name = htmlspecialchars($_POST['name']);
                if ($user->checkIfUserExist('name') > 0) {
                    $formErrors['name'] = ERROR_ALREADY_TAKEN_name;
                }
            } else {
                $formErrors['name'] = ERROR_INVALID_name;
            }
        } else {
            $formErrors['name'] = ERROR_EMPTY_name;
        }

        if (!empty($_POST['mail'])) {
            if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
                $user->mail = htmlspecialchars($_POST['mail']);
                if ($user->checkIfUserExist('mail') > 0) {
                    $formErrors['mail'] = ERROR_ALREADY_TAKEN_MAIL;
                }
            } else {
                $formErrors['mail'] = ERROR_INVALID_MAIL;
            }
        } else {
            $formErrors['mail'] = ERROR_EMPTY_MAIL;
        }

        if (!empty($_POST['password'])) {
            $password = true;
        } else {
            $formErrors['password'] = ERROR_EMPTY_PASSWORD;
        }

        if (!empty($_POST['passwordVerify'])) {
            $passwordVerify = true;
        } else {
            $formErrors['passwordVerify'] = ERROR_EMPTY_PASSWORD;
        }

        if (isset($password) && isset($passwordVerify)) {
            if ($_POST['password'] === $_POST['passwordVerify']) {
                // j'hydrate le password pour préparer son hashage avec du sel
                $user->password = password_hash($_POST['password'] . $salt, PASSWORD_DEFAULT);
            } else {
                $formErrors['password'] = $formErrors['passwordVerify'] = ERROR_DIFFERENT_PASSWORD;
            }
        }

        if (count($formErrors) == 0) {
            if (!$user->addUser()) {
                $formErrors['register'] = ERROR_DB;
            } else{
                $_SESSION['success'] = SUCCESS_REGISTER;
                header("Location: /accueil");
                exit;
            }
        }
    }
}
