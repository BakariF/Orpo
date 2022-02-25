<?php
$title = 'Connexion';
include '../models/user.php';
include '../controllers/loginCTRL.php';
include '../parts/header.php';

?>
<div class="container">
    <?php if (isset($formErrors['login'])) { ?>
        <div class="alert alert-dismissible alert-danger">
            <?= $formErrors['login'] ?>
        </div>
    <?php } ?>

    <form action="#" method="POST">

        <div class="form-group <?= !$form ?: (isset($formErrors['mail']) ? 'has-danger' : 'has-success') ?>">
            <label class="form-control-label" for="mail">Adresse mail</label>
            <input id="mail" type="mail" name="mail" placeholder="dupont.jean@exemple.com" class="form-control <?= !$form ?: (isset($formErrors['mail']) ? 'is-invalid' : 'is-valid') ?>" value="<?= @$_POST['mail'] ?>" />
            <div class="invalid-feedback"><?= @$formErrors['mail'] ?></div>
        </div>

        <div class="form-group <?= !$form ?: (isset($formErrors['password']) ? 'has-danger' : 'has-success') ?>">
            <label class="form-control-label" for="password">Mot de passe</label>
            <input id="password" type="password" name="password" placeholder="********" class="form-control <?= !$form ?: (isset($formErrors['password']) ? 'is-invalid' : 'is-valid') ?>" value="<?= @$_POST['password'] ?>" />
            <div class="invalid-feedback"><?= @$formErrors['password'] ?></div>
        </div>

        <button type="submit" name="login" class="btn btn-primary">Connexion</button>

    </form>
</div>
<?php
var_dump($_GET); 
include('../parts/footer.php'); ?>