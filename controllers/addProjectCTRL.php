<?php
include '../regex.php';
include '../config.php';
//a mettre dans le fichier regex demain----
    $regexImg = '/.*\.(jpe?g|bmp|png)$/igm';
    $showStatus = new status();
    $getStatus = $showStatus->getStatus();

$form = false;
$formError = array();

if (isset($_POST['save'])) {
    $form = true;
    $project = new project();

    if (!empty($_POST['title'])) {
        if (preg_match($regexProject['project'], $_POST['title'])) {
            $project->title = htmlspecialchars($_POST['title']);
        } else {
            $formErrors['title'] = ERROR_INVALID_TITLE;
        }
    } else {
        $formErrors['title'] = ERROR_EMPTY_TITLE;
    }
    if (!empty($_POST['problematicsWeNeedToSolve'])) {
        if (preg_match($regexProject['project'], $_POST['problematicsWeNeedToSolve'])) {
            $project->title = htmlspecialchars($_POST['problematicsWeNeedToSolve']);
        } else {
            $formErrors['problematicsWeNeedToSolve'] = ERROR_INVALID_PROJECTPB;
        }
    } else {
        $formErrors['problematicsWeNeedToSolve'] = ERROR_EMPTY_PROJECTPB;
    }
    if (!empty($_POST['projectSolution'])) {
        if (preg_match($regexProject['project'], $_POST['projectSolution'])) {
            $project->title = htmlspecialchars($_POST['projectSolution']);
        } else {
            $formErrors['projectSolution'] = ERROR_INVALID_PROJECTSOLUCE;
        }
    } else {
        $formErrors['projectSolution'] = ERROR_EMPTY_PROJECTSOLUCE;
    }
    if (!empty($_POST['budget'])) {
        if (preg_match($regexnumber['number'], $_POST['budget'])) {
            $project->title = htmlspecialchars($_POST['budget']);
        } else {
            $formErrors['budget'] = ERROR_INVALID_BUDGET;
        }
    } else {
        $formErrors['budget'] = ERROR_INVALID_BUDGET;
    }
    if (!empty($_POST['duration'])) {
        if (preg_match($regexProject['duration'], $_POST['duration'])) {
            $project->title = htmlspecialchars($_POST['duration']);
        } else {
            $formErrors['duration'] = ERROR_INVALID_DURATION;
        }
    } else {
        $formErrors['duration'] = ERROR_EMPTY_DURATION;
    }
    if (!empty($_POST['projectsSteps'])) {
        if (preg_match($regexProject['project'], $_POST['projectsSteps'])) {
            $project->title = htmlspecialchars($_POST['projectsSteps']);
        } else {
            $formErrors['projectsSteps'] = ERROR_INVALID_PROJECTSTEPS;
        }
    } else {
        $formErrors['projectsSteps'] = ERROR_EMPTY_PROJECTSTEPS;
    }
    if (!empty($_POST['id_projectstatut'])) {
        if (preg_match($regexProject['id_projectstatut'], $_POST['id_projectstatut'])) {
            $project->title = htmlspecialchars($_POST['id_projectstatut']);
        } else {
            $formErrors['id_projectstatut'] = ERROR_INVALID_STATUS;
        }
    } else {
        $formErrors['id_projectstatut'] = ERROR_EMPTY_STATUS;
    }



    if (!empty($_POST['image'])) {
        if (preg_match($regexProject['image'], $_POST['image'])) {
            $project->title = htmlspecialchars($_POST['image']);
        } else {
            $formErrors['image'] = ERROR_INVALID_TITLE;
        }
    } else {
        $formErrors['image'] = ERROR_EMPTY_TITLE;
    }
}

// verifier option pour qu'elles ne sortent pas