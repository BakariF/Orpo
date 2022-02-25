
<?php
session_start();

include '../config.php';
include '../regex.php';

$user = new user;
$formErrors = array();
$form = false;

if (isset($_POST['modalDelete'])) {
    $salt = 'Mugabeisabadperson';
    $form = true;
    if (!empty($_POST['passwordDelete'])) {
        $user->id = $_SESSION['profile']['id'];
        if ($user->getHashByMail('id')) {
            if (!password_verify($_POST['passwordDelete'] . $salt, $user->password)) {
                $formErrors['passwordDelete'] = ERROR_INVALID_PASSWORD;
            }
        } else {
            $formErrors['passwordDelete'] = ERROR_DB;
        }
    } else {
        $formErrors['passwordDelete'] = ERROR_EMPTY_PASSWORD;
    }
    if (count($formErrors) == 0) {
        if ($user->deleteProfile()) {
            session_destroy();
            header("Location: /accueil");
            exit();
        }
    }
}

// fonctionne
if (isset($_POST['nameModification'])) {
    $form = true;
    if (!empty($_POST['name'])) {
        $user->id = $_SESSION['profile']['id'];
        if (preg_match($regexUser['name'], $_POST['name'])) {
            $user->name = htmlspecialchars($_POST['name']);
        } else {
            $formErrors['name'] = ERROR_INVALID_name;
        }
    } else {
        $formErrors['name'] = ERROR_EMPTY_name;
    }
    if (count($formErrors) == 0) {
        if ($user->modifyname()) {
            $_SESSION['profile']['name'] = $user->name;
            header('location: /mon-profil');
            $_SESSION['success'] = SUCCESS_MODIFY_name;
        } else {
            $formErrors['name'] = ERROR_DB;
        }
    }
}

//fonctionne
if (isset($_POST['mailModification'])) {
    $form = true;
    if (!empty($_POST['mail'])) {
        $user->id = $_SESSION['profile']['id'];
        if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            $user->mail = htmlspecialchars($_POST['mail']);
        } else {
            $formErrors['mail'] = ERROR_INVALID_MAIL;
        }
    } else {
        $formErrors['mail'] = ERROR_EMPTY_MAIL;
    }
    if (count($formErrors) == 0) {
        if ($user->modifyMail()) {
            $_SESSION['profile']['mail'] = $user->mail;
            header('location: /mon-profil');
            $_SESSION['success'] = SUCCESS_MODIFY_MAIL;
        } else {
            $formErrors['name'] = ERROR_DB;
        }
    }
}

//fonctionne pas encore
// au clic
if (isset($_POST['sendPasswordModif'])) {
    $salt = 'Mugabeisabadperson';
    $form = true;
    //je verifie si password n'est pas vide
    if (!empty($_POST['password'])) {
        //je récupère l'id de la session
        $user->id = $_SESSION['profile']['id'];
        // je récupère le hash
        if ($user->getHashByMail('id')) {
            //je vérifie si le mdp est le même que celui de la bdd
            if (!password_verify($_POST['password'] . $salt, $user->password)) {
                $formErrors['password'] = ERROR_INVALID_PASSWORD;
            }
        } else {
            $formErrors['password'] = ERROR_DB;
        }
    }

    if (!empty($_POST['passwordChange'])) {
        $password = $_POST['passwordChange'];
    } else {
        $formErrors['passwordChange'] = ERROR_EMPTY_PASSWORD;
    }

    if (!empty($_POST['passwordConfirmation'])) {
        $passwordConfirmation = $_POST['passwordConfirmation'];
    } else {
        $formErrors['passwordConfirmation'] = ERROR_EMPTY_PASSWORD;
    }

    if (count($formErrors) == 0) {
        if ($password === $passwordConfirmation) {
            $user->password =  password_hash($password . $salt, PASSWORD_DEFAULT);
            $user->modifyPassword();
            header('location: /mon-profil');
            $_SESSION['success'] = SUCCESS_MODIFY_PASSWORD;
        } else {
            $formErrors['passwordChange'] = $formErrors['passwordConfirmation'] = ERROR_DIFFERENT_PASSWORD;
        }
    }
}
