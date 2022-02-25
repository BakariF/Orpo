<?php
$title = 'Ajouter un projet';
include '../models/status.php';
include '../models/project.php';
include '../controllers/addProjectCTRL.php';
include '../parts/header.php';
?>
<form action="/ajouter-projet" method="POST" enctype="multipart/form-data">

    <div class="rounded border border-dark p-5 mt-3">

        <h2 class="text-center">Premier groupe</h2>
        <div class="form-group <?= !$form ?: (isset($formErrors['title']) ? 'has-danger' : 'has-success') ?>">
            <label class="form-control-label" for="title">Nom du projet</label>
            <input id="title" type="text" name="title" placeholder="Projet" class="form-control <?= !$form ?: (isset($formErrors['title']) ? 'is-invalid' : 'is-valid') ?>" value="<?= @$_POST['title'] ?>" />
            <div class="invalid-feedback"><?= @$formErrors['title'] ?></div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <p class="fakeLabel">Image de présentation</p>

                    <div class="input-group mb-3">
                        <div class="custom-file">
                            <label class="custom-file-label" for="image">jpg, png, gif</label>

                            <input type="file" name="image" class="custom-file-input" id="image" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group <?= !$form ?: (isset($formErrors['duration']) ? 'has-danger' : 'has-success') ?>">
                    <label class="form-control-label" for="duration">Durée de réalisation</label>

                    <div class="input-group">
                        <input id="duration" type="number" name="duration" placeholder="1" class="form-control col-9 <?= !$form ?: (isset($formErrors['duration']) ? 'is-invalid' : 'is-valid') ?>" value="<?= @$_POST['duration'] ?>" />
                        <select id="projectStatus" name="projectStatus" class="form-control custom-select col-3">
                            <option>mois</option>
                            <option>an.s</option>
                        </select>
                    </div>
                    <div class="invalid-feedback"><?= @$formErrors['duration'] ?></div>
                </div>
            </div>
        </div>

    <div class="form-group <?= !$form ?: (isset($formErrors['description']) ? 'has-danger' : 'has-success') ?>">
        <label class="form-control-label" for="description">Description</label>
        <textarea id="description" name="description" placeholder="Ce projet consiste à..." class="form-control <?= !$form ?: (isset($formErrors['description']) ? 'is-invalid' : 'is-valid') ?>"><?= @$_POST['description'] ?></textarea>
        <div class="invalid-feedback"><?= @$formErrors['description'] ?></div>
    </div>

</div>

<div class="rounded border border-dark p-5 mt-3">

    <h2 class="text-center">deuxième groupe</h2>
    <div class="form-group <?= !$form ?: (isset($formErrors['problematicsWeNeedToSolve']) ? 'has-danger' : 'has-success') ?>">
        <label class="form-control-label" for="problematicsWeNeedToSolve">Problématiques</label>
        <textarea id="problematicsWeNeedToSolve" name="problematicsWeNeedToSolve" placeholder="Conception d'une pièce spécifique" class="form-control <?= !$form ?: (isset($formErrors['problematicsWeNeedToSolve']) ? 'is-invalid' : 'is-valid') ?>"><?= @$_POST['problematicsWeNeedToSolve'] ?></textarea>
        <div class="invalid-feedback"><?= @$formErrors['problematicsWeNeedToSolve'] ?></div>
    </div>

    <div class="form-group <?= !$form ?: (isset($formErrors['projectSolution']) ? 'has-danger' : 'has-success') ?>">
        <label class="form-control-label" for="projectSolution">Solutions envisagées</label>
        <textarea id="projectSolution" name="projectSolution" placeholder="Location d'une imprimante 3D" class="form-control <?= !$form ?: (isset($formErrors['projectSolution']) ? 'is-invalid' : 'is-valid') ?>"><?= @$_POST['projectSolution'] ?></textarea>
        <div class="invalid-feedback"><?= @$formErrors['projectSolution'] ?></div>
    </div>

</div>

<div class="rounded border border-dark p-5 mt-3 mb-5">
    <h2 class="text-center">troisième groupe </h2>
    <div class="form-group <?= !$form ?: (isset($formErrors['projectSteps']) ? 'has-danger' : 'has-success') ?>">
        <label class="form-control-label" for="projectSteps">Etapes du projet</label>
        <textarea id="projectSteps" name="projectSteps" placeholder="1. Etape 1 <?= "\r\n" ?>2. Etape 2" class="form-control <?= !$form ?: (isset($formErrors['projectSteps']) ? 'is-invalid' : 'is-valid') ?>"><?= @$_POST['projectSteps'] ?></textarea>
        <div class="invalid-feedback"><?= @$formErrors['projectSteps'] ?></div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="form-group <?= !$form ?: (isset($formErrors['projectStatus']) ? 'has-danger' : 'has-success') ?>">
                <label class="form-control-label" for="projectStatus">Statut du projet</label>
                <select id="projectStatus" name="projectStatus" class="form-control custom-select <?= !$form ?: (isset($formErrors['projectStatus']) ? 'is-invalid' : 'is-valid') ?>">
                    <?php foreach ($getStatus as $status) { ?>
                        <option value="<?= $status->id ?>"><?= $status->name ?></option>
                    <?php } ?>
                </select>
                <div class="invalid-feedback"><?= @$formErrors['projectStatus'] ?></div>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group <?= !$form ?: (isset($formErrors['budget']) ? 'has-danger' : 'has-success') ?>">
                <label class="form-control-label" for="budget">Budget</label>
                <input id="budget" type="number" name="budget" placeholder="15 000" class="form-control <?= !$form ?: (isset($formErrors['budget']) ? 'is-invalid' : 'is-valid') ?>" value="<?= @$_POST['budget'] ?>" />
                <div class="invalid-feedback"><?= @$formErrors['budget'] ?></div>
            </div>
        </div>
    </div>
</div>
    <button type="submit" name="save" class="btn btn-success">Enregistrer</button>
</form>
<?php include('../parts/footer.php'); ?>