<?php
$title = 'Modifier';

//Permet de définir le titre selon le paramètre d'URL "update"
if (!empty($_GET['update'])){
    switch ($_GET['update']) {
        case 'motdepasse':
            $title .= ' mot de passe';
            break;
        case 'identifiant':
            $title .= ' identifiant';
            break;
        case 'mail':
            $title .= ' adresse mail';
            break;
    }
}

include '../models/user.php';
include '../controllers/editProfileCTRL.php';
include '../parts/header.php';

if($_GET['update'] == 'identifiant'){
?>

<form action="identifiant" method="POST">
    <div class="form-group <?= !$form ?: (isset($formErrors['username']) ? 'has-danger' : 'has-success') ?>">
        <label class="form-control-label" for="username">Nom d'utilisateur</label>
        <input id="username" type="text" name="username" placeholder="JeanDupont" class="form-control <?= !$form ?: (isset($formErrors['username']) ? 'is-invalid' : 'is-valid') ?>" value="<?= isset($_POST['username']) ? $_POST['username'] : $_SESSION['profile']['username'] ?>" />
        <div class="invalid-feedback"><?= @$formErrors['username'] ?></div>
    </div>
    <button type="submit" class="btn btn-warning w-25 mb-2" name="usernameModification">Modifier</button>
</form>
<?php } else if($_GET['update'] == 'mail'){?>

<form action="mail" method="post">
    <div class="form-group <?= !$form ?: (isset($formErrors['mail']) ? 'has-danger' : 'has-success') ?>">
        <label class="form-control-label" for="mail">Adresse mail</label>
        <input id="mail" type="text" name="mail" placeholder="dupont.jean@exemple.com" class="form-control <?= !$form ?: (isset($formErrors['mail']) ? 'is-invalid' : 'is-valid') ?>" value="<?= isset($_POST['mail']) ? $_POST['mail'] : $_SESSION['profile']['mail'] ?>" />
        <div class="invalid-feedback"><?= @$formErrors['mail'] ?></div>
    </div>
    <button type="submit" class="btn btn-warning w-25 mb-2" name="mailModification">Modifier</button>
</form>
<?php } else if($_GET['update'] == 'motdepasse'){?>
<form action="motdepasse" method="post">

    <div class="form-group <?= !$form ?: (isset($formErrors['password']) ? 'has-danger' : 'has-success') ?>">
        <label class="form-control-label" for="password">Ancien mot de passe</label>
        <input id="password" type="password" name="password" placeholder="********" class="form-control <?= !$form ?: (isset($formErrors['password']) ? 'is-invalid' : 'is-valid') ?>" />
        <div class="invalid-feedback"><?= @$formErrors['password'] ?></div>
    </div>

    <hr class="my-4" />
<!-- ******************************** -->
    <div class="form-group <?= !$form ?: (isset($formErrors['passwordChange']) ? 'has-danger' : 'has-success') ?>">
        <label class="form-control-label" for="passwordChange">Nouveau mot de passe</label>
        <input id="passwordChange" type="password" name="passwordChange" placeholder="********" class="form-control <?= !$form ?: (isset($formErrors['passwordChange']) ? 'is-invalid' : 'is-valid') ?>" />
        <div class="invalid-feedback"><?= @$formErrors['passwordChange'] ?></div>
    </div>

    <div class="form-group <?= !$form ?: (isset($formErrors['passwordConfirmation']) ? 'has-danger' : 'has-success') ?>">
        <label class="form-control-label" for="passwordConfirmation">Confirmation du nouveau mot de passe</label>
        <input id="passwordConfirmation" type="password" name="passwordConfirmation" placeholder="********" class="form-control <?= !$form ?: (isset($formErrors['passwordConfirmation']) ? 'is-invalid' : 'is-valid') ?>" />
        <div class="invalid-feedback"><?= @$formErrors['passwordConfirmation'] ?></div>
    </div>

    <button type="submit" class="btn btn-warning w-25 mb-2" name="sendPasswordModif">Modifier</button>
</form>
<?php } ?>
<?php
include('../parts/footer.php');
?>