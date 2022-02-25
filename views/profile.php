<?php
$title = "PROFIL";
include '../models/user.php';
include '../controllers/editProfileCTRL.php';
include '../parts/header.php';
/* include '../models/profil.php'; */
/* include '../controllers/profileCTRL.php'; */
?>
<?php if (isset($_SESSION['success'])) { ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $_SESSION['success'];
            unset($_SESSION['success']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php } ?>
<div class="row">
    <!-- le row facilite le col -->
    <div class="col-4">
        <div class="jumbotron m-0 h-100">
            <a href="/accueil"><button class="btn btn-success mb-3">Retour</button></a>
            <hr class="my-4" />

            <p class="mb-2 mt-5">
                <i class="bi bi-person"></i> <?= isset($_SESSION['profile']['username']) ? $_SESSION['profile']['username'] : '' ?>
                <a class="text-warning mb-2" href="/modifier/identifiant"><i class="bi bi-pencil-fill"></i></a>
            </p>

            <hr class="my-4" />

            <p class="mb-2 mt-5">
                <i class="bi bi-at"></i> <?= isset($_SESSION['profile']['mail']) ? $_SESSION['profile']['mail'] : '' ?>
                <a class="text-warning mb-2" href="/modifier/mail"><i class="bi bi-pencil-fill"></i></a>
            </p>
            <hr class="my-4" />

            <p class="mb-2 mt-5">
                <i class="bi bi-key"></i> ************
                <a class="text-warning mb-2" href="/modifier/motdepasse"><i class="bi bi-pencil-fill"></i></a>
            </p>

            <hr class="my-4" />
            
            <button type="button" class="btn btn-danger w-30 mt-3" name="deleteUser" data-toggle="modal" data-target="#modalOpen"><i class="bi bi-trash"></i>&nbsp;Supprimer</button>
            <div class="modal" id="modalOpen">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Supprimer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="#" method="POST">
                            <div class="modal-body">
                                <p>Voulez-vous réellement supprimer votre profil ?</p>
                                <div class="form-group <?= !$form ?: (isset($formErrors['passwordDelete']) ? 'has-danger' : 'has-success') ?>">
                                    <label class="form-control-label" for="passwordDelete">Ancien mot de passe</label>
                                    <input id="passwordDelete" type="password" name="passwordDelete" placeholder="********" class="form-control <?= !$form ?: (isset($formErrors['passwordDelete']) ? 'is-invalid' : 'is-valid') ?>" />
                                    <div class="invalid-feedback"><?= @$formErrors['passwordDelete'] ?></div>
                                </div>
                            </div>
                            <div class="modal-footer">

                                <input type="submit" class="btn btn-primary" name="modalDelete" value="Oui" />
                                <button type="button" class="btn btn-secondary" data-dismiss="modal" name="modalQuit">Non</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-8">
        <div class="jumbotron m-0 h-100">

        </div>
    </div>
</div>
<?php
include '../parts/footer.php'; ?>