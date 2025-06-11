<?php
require_once '../bootstrap.php';
require_once MODEL_PATH . '/CvModel.php';
require_once CONTROLLER_PATH . '/CvController.php';
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Générateur de CV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
</head>
<body>
<header class="row ms-2 me-2 mt-2 mb-3">
    <a class="btn btn-warning shadow" href="/" role="button">Retour en arrière</a>
</header>

<section class="container text-center">
    <div class="row">
        <div class="col-12 bg-success text-white p-3 m-3 rounded shadow text-start min-vh-100">
            <h1 class="text-center mb-4 ">Votre CV généré</h1>

            <div class="row mb-3">
                <div class="col-4">
                    <img src="/img/profile.png" alt="Photo" class="img-fluid rounded ms-5" width="150" height="150">
                </div>
                <ul class="list-group p-3 ">
                    <?php if ($cv !== null) {?>
                    <li class="list-group">
                        <li class="list-group-item bg-success text-white rounded"><strong>Prénom :</strong> <?= htmlspecialchars($cv->getFirstName()) ?></li>
                        <li class="list-group-item bg-success text-white rounded"><strong>Nom :</strong> <?= htmlspecialchars($cv->getName()) ?></li>
                        <li class="list-group-item bg-success text-white rounded"><strong>Région :</strong> <?= htmlspecialchars($cv->getRegion()) ?></li>
                        <li class="list-group-item bg-success text-white rounded"><strong>Ville :</strong> <?= htmlspecialchars($cv->getCity()) ?></li>
                        <li class="list-group-item bg-success text-white rounded"><strong>Métier :</strong> <?= htmlspecialchars($cv->getJob()) ?></li>
                        <li class="list-group-item bg-success text-white rounded"><strong>Date de naissance :</strong> <?= htmlspecialchars($cv->getBirth()) ?></li>
                        <li class="list-group-item bg-success text-white rounded"><strong>Email :</strong> <?= htmlspecialchars($cv->getEmail()) ?></li>
                        <li class="list-group-item bg-success text-white rounded"><strong>Compétences :</strong>
                            <?php
                            $skills = $cv->getSkills();
                            if (!empty($skills)) {
                                echo implode(', ', array_map('htmlspecialchars', $skills));
                            } else {
                                echo '<em>Aucune compétence renseignée</em>';
                            }
                            ?>
                        </li>
                        <li class="list-group-item bg-success text-white"><strong>Âge :</strong>
                            <?php
                            $age = $cv->getAge();
                            echo $age !== null ? htmlspecialchars((string)$age) . ' ans' : '<em>Inconnu</em>';
                            ?>
                        </li>
                        <?php } else { ?>
                            <li class="list-group-item bg-danger text-white">Aucun CV trouvé.</li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
    </section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
