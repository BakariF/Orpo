<?php
//"Constante", je donnes les information de connexion à la base de données.
define('SQL_HOST', 'localhost');
define('SQL_DBNAME', 'orpo');
define('SQL_USER', 'root');
define('SQL_PWD', '');
define('SQL_PREFIX', '`g5e1d_');

//Et là j'ajoute les fichiers nécessaire au bon fonctionnement du site pour pas les include,
//à chaque fois.

/* define('SQL_HOST', 'localhost');
define('SQL_DBNAME', 'c60nvestor');
define('SQL_USER', 'c60bakarif');
define('SQL_PWD', 'ZjzcMM95@ ');
define('SQL_PREFIX', '`m4i9k`'); */

define('ERROR_EMPTY_name', 'Veuillez entrer votre nom d\'utilisateur');
define('ERROR_INVALID_name', 'Votre nom d\'utilisateur ne doit contenir que des lettres');
define('ERROR_ALREADY_TAKEN_name', 'Un compte avec ce nom d\'utilisateur existe déjà');

define('ERROR_INVALID_PASSWORD', 'Mot de passe incorrect');

define('SUCCESS_REGISTER', 'Votre inscription a bien été prise en compte');
define('SUCCESS_SESSION_DESTROYED', 'Votre compte a bien été supprimé');
define('SUCCESS_MODIFY_PASSWORD', 'bravo, votre mot de passe a été modifié');
define('SUCCESS_MODIFY_name', 'bravo, votre identifiant a été modifié');
define('SUCCESS_MODIFY_MAIL', 'bravo, votre adresse mail a été modifié');
define('SUCCESS_MODIFY_REGISTER', 'bravo, votre compte a bien été enregistré');

define('ERROR_EMPTY_MAIL', 'Veuillez entrer votre adresse mail');
define('ERROR_INVALID_MAIL', 'Veuillez entrer une adresse mail valide');
define('ERROR_ALREADY_TAKEN_MAIL', 'Un compte avec cette adresse mail existe déjà');


define('ERROR_EMPTY_PASSWORD', 'Veuillez entrer votre mot de passe');
define('ERROR_DIFFERENT_PASSWORD', 'Les mots de passe ne correspondent pas');

define('ERROR_EMPTY_TITLE', 'Veuillez entrer un titre');
define('ERROR_INVALID_TITLE', 'Veuillez entrer un titre comprenant au moins une lettre');

define('ERROR_EMPTY_PROJECTPB', 'Veuillez remplir ce champ');
define('ERROR_INVALID_PROJECTPB', 'Veuillez entrer dans ce champ au moins une lettre');

define('ERROR_EMPTY_PROJECTSOLUCE', 'Veuillez remplir ce champ');
define('ERROR_INVALID_PROJECTSOLUCE', 'Veuillez entrer dans ce champ au moins une lettre');

define('ERROR_EMPTY_PROJECTSTEPS', 'Veuillez remplir ce champ');
define('ERROR_INVALID_PROJECTSTEPS', 'Veuillez entrer dans ce champ au moins une lettre');

define('ERROR_EMPTY_STATUS', 'Veuillez mettre un statut');
define('ERROR_INVALID_STATUS', 'Ce statut n\'est pas possible');

define('ERROR_EMPTY_BUDGET', 'Veuillez sélectionner une durée');
define('ERROR_INVALID_BUDGET', 'Cette durée n\'est pas possible');


define('ERROR_EMPTY_DURATION', 'Veuillez sélectionner une durée');
define('ERROR_INVALID_DURATION', 'Cette durée n\'est pas possible');

define('ERROR_LOGIN', 'Mauvais identifiant ou mot de passe');
define('ERROR_DB', 'Une erreur technique est survenu. Veuillez réessayer. Si le problème persiste merci de nous contacter');
