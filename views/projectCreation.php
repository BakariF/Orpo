<!DOCTYPE html>
<html lang="fr">

<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Document</title>
</head>

<body>
     
          <form action="une page avec une condition qui permet à l'utilisateur de savoir si son projet a été ajouté ou s'il a mal fait quelque chose" method="$_POST">
               <!-- la methode post récupère le name -->
               <div class="border border-dark">
               <input type="text" placeholder="nom de votre projet">

               <label for="description" style="display: block;">Présentation simple (nombre de mot limité)</label>
               <textarea id="descriptions" rows="5" cols="200" name="presentation"></textarea>
               <?php if (isset($formErrors['presentation'])) { ?>
                    <p class="text-danger"><?= $formErrors['presentation'] ?></p>
               <?php } else { ?>
                    <small class="errorAlert" class="form-text text-muted">Merci de renseigner votre adresse mail</small>
               <?php } ?>

               <label for="description" style="display: block; ">Objectif du projet</label>
               <textarea id="descriptions" name="objectif" rows="5" cols="200"></textarea>
               <?php if (isset($formErrors['objectif'])) { ?>
                    <p class="text-danger"><?= $formErrors['objectif'] ?></p>
               <?php } else { ?>
                    <small class="errorAlert" class="form-text text-muted">Merci de renseigner votre adresse mail</small>
               <?php } ?>
     </div>
     <label for="description" style="display: block;">Problématique</label>
     <textarea id="descriptions" name="problematic" rows="5" cols="200"></textarea>
     <?php if (isset($formErrors['problematic'])) { ?>
          <p class="text-danger"><?= $formErrors['problematic'] ?></p>
     <?php } else { ?>
          <small class="errorAlert" class="form-text text-muted">Merci de renseigner votre adresse mail</small>
     <?php } ?>
     <label for="description" style="display: block;">solution</label>
     <textarea id="descriptions" name="solution" rows="5" cols="200"></textarea>
     <?php if (isset($formErrors['solution'])) { ?>
          <p class="text-danger"><?= $formErrors['solution'] ?></p>
     <?php } else { ?>
          <small class="errorAlert" class="form-text text-muted">Merci de renseigner votre adresse mail</small>
     <?php } ?>
     <label for="description" style="display: block;">étapes du projet</label>
     <textarea id="descriptions" name="steps" rows="5" cols="200"></textarea>
     <?php if (isset($formErrors['steps'])) { ?>
          <p class="text-danger"><?= $formErrors['steps'] ?></p>
     <?php } else { ?>
          <small class="errorAlert" class="form-text text-muted">Merci de renseigner votre adresse mail</small>
     <?php } ?>
     <input type="number" placeholder="budget estimé">
     <label for="description" style="display: block;">documents supports (img, vid, odt, etc)</label>
     <button>Envoyez</button>
     </form>
</body>

</html>