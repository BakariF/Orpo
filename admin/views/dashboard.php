<?php
$title = 'Dashboard admin';
include '../models/user.php';
include '../controllers/dashboardCTRL.php';
include '../parts/header.php';
?>
<div class="row">
    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
        <h2><i class="bi bi-person-circle"></i>&nbsp;Derniers utilisateurs</h2>
        <ul class="list-group">
            <?php foreach ($usersList as $userDetails) { ?>
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <ul class="lastItems">
                        <li><strong><?= $userDetails->username ?></strong></li>
                        <li><?= $userDetails->mail ?></li>
                        <li><em><?= $userDetails->registerDate ?></em></li>
                    </ul>
                    <span class="badge text-primary badge-pill"><a href="userProfile.php?id=<?= $userDetails->id ?>">></a></span>
                </li>
            <?php } ?>
        </ul>
    </div>
    <div class="col-12 col-md-6 col-lg-6 col-xl-6">
        <h2><i class="bi bi-bullseye"></i>&nbsp;Derniers projets</h2>
        <ul class="list-group">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Cras justo odio
                <span class="badge text-primary badge-pill">></span>
            </li>
            </li>
        </ul>
    </div>
</div>

<?php include '../parts/footer.php' ?>