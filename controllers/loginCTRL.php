<?php
session_start();
include '../config.php';
$formErrors = array();
$form = false;

//Vérification du formulaire de connexion
if (isset($_POST['login'])) {
    $form = true;
    $user = new user;
    $salt = 'Mugabeisabadperson';

    if (!empty($_POST['mail'])) {
        if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
            $user->mail = htmlspecialchars($_POST['mail']);
        } else {
            $formErrors['mail'] = ERROR_INVALID_MAIL;
        }
    } else {
        $formErrors['mail'] = ERROR_EMPTY_name;
    }

    if (!empty($_POST['password'])) {
        //je stocke dans la variable hash, le resultat de la méthode getHash qui a en paramètre 'mail'
        if (!isset($formErrors['mail'])) {
            $hash = $user->getHashByMail('mail');
            if (password_verify($_POST['password'] . $salt, $hash)) {
                //On récupère son profil
                if ($user->getUserInfo('mail')) {
                    //On met en session ses informations
                    $_SESSION['profile']['id'] = $user->id;
                    $_SESSION['profile']['mail'] = $user->mail;
                    $_SESSION['profile']['name'] = $user->name;
                    $_SESSION['profile']['id_g5e1d_roles'] = $user->role;

                    if ($user->role == 1) {
                        header("Location: /administration");
                        exit();
                    } else {
                        header("Location: /accueil");
                        exit();
                    }
                } else {
                    $formErrors['login'] = ERROR_DB;
                }
            } else {
                $formErrors['password'] = $formErrors['mail'] = ERROR_LOGIN;
            }
        } else {
            $formErrors['login'] = ERROR_DB;
        }
    } else {
        $formErrors['password'] = ERROR_EMPTY_PASSWORD;
    }
}

//je supprime le profil avec avoir cliqué sur supprimer et valider sur une modale
