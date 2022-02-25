<?php
$title = 'Inscription';
include '../models/user.php';
include '../controllers/registerCTRL.php';
include '../parts/header.php';
?>
<?php if (isset($formErrors['register'])) { ?>
    <div class="alert alert-dismissible alert-danger">
        <?= $formErrors['register'] ?>
    </div>
<?php } ?>

<form action="#" method="POST">

    <div class="form-group <?= !$form ?: (isset($formErrors['name']) ? 'has-danger' : 'has-success') ?>">
        <label class="form-control-label" for="name">Nom</label>
        <input id="name" type="text" name="name" placeholder="JeanDupont" class="form-control <?= !$form ?: (isset($formErrors['name']) ? 'is-invalid' : 'is-valid') ?>" value="<?= @$_POST['name'] ?>" />
        <div class="invalid-feedback"><?= @$formErrors['name'] ?></div>
    </div>

    <div class="form-group <?= !$form ?: (isset($formErrors['mail']) ? 'has-danger' : 'has-success') ?>">
        <label class="form-control-label" for="mail">Adresse mail</label>
        <input id="mail" type="mail" name="mail" placeholder="dupont.jean@exemple.com" class="form-control <?= !$form ?: (isset($formErrors['mail']) ? 'is-invalid' : 'is-valid') ?>" value="<?= @$_POST['mail'] ?>" />
        <div class="invalid-feedback"><?= @$formErrors['mail'] ?></div>
    </div>

    <div class="form-group <?= !$form ?: (isset($formErrors['password']) ? 'has-danger' : 'has-success') ?>">
        <label class="form-control-label" for="password">Mot de passe</label>
        <input id="password" type="password" name="password" placeholder="********" class="form-control <?= !$form ?: (isset($formErrors['password']) ? 'is-invalid' : 'is-valid') ?>" value="<?= @$_POST['password'] ?>" />
        <!-- if isset variable, echo variable, raccourcis de ternaire -->
        <div class="invalid-feedback"><?= @$formErrors['password'] ?></div>
    </div>

    <div class="form-group <?= !$form ?: (isset($formErrors['passwordVerify']) ? 'has-danger' : 'has-success') ?>">
        <label class="form-control-label" for="passwordVerify">Confirmation mot de passe</label>
        <input id="passwordVerify" type="password" name="passwordVerify" placeholder="********" class="form-control <?= !$form ?: (isset($formErrors['passwordVerify']) ? 'is-invalid' : 'is-valid') ?>" value="<?= @$_POST['passwordVerify'] ?>" />
        <div class="invalid-feedback"><?= @$formErrors['passwordVerify'] ?></div>
    </div>

    <button type="submit" name="register" class="btn btn-success">Inscription</button>
</form>
<?php include '../parts/footer.php'; ?>