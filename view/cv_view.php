<?php
require_once '../bootstrap.php';
require_once MODEL_PATH . '/UserModel.php';
require_once CONTROLLER_PATH . '/CvController.php';
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Générateur de user$user</title>
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
                <li class="list-group p-3 ">
                    <?php if ($user !== null) {?>
                    <ul class="list-group">
                        <li class="list-group-item bg-success text-white rounded"><strong>Prénom :</strong> <?= htmlspecialchars($user->getFirstName()) ?></li>
                        <li class="list-group-item bg-success text-white rounded"><strong>Nom :</strong> <?= htmlspecialchars($user->getName()) ?></li>
                        <li class="list-group-item bg-success text-white rounded"><strong>Région :</strong> <?= htmlspecialchars($user->getRegion()) ?></li>
                        <li class="list-group-item bg-success text-white rounded"><strong>Ville :</strong> <?= htmlspecialchars($user->getCity()) ?></li>
                        <li class="list-group-item bg-success text-white rounded"><strong>Métier :</strong> <?= htmlspecialchars($user->getJob()) ?></li>
                        <li class="list-group-item bg-success text-white rounded"><strong>Date de naissance :</strong> <?= !empty($user->getBirthDay()) ? htmlspecialchars($user->getBirthDay('d/m/Y')) : '--' ?></li>
                        <li class="list-group-item bg-success text-white rounded"><strong>Email :</strong> <?= htmlspecialchars($user->getEmail()) ?></li>
                        <li class="list-group-item bg-success text-white rounded"><strong>Compétences :</strong>
                            <?php
                            $skills = $user->getSkills();
                            if (!empty($skills)) {
                                echo implode(', ', array_map('htmlspecialchars', $skills));
                            } else {
                                echo '<em>Aucune compétence renseignée</em>';
                            }
                            ?>
                        </li>
                        <li class="list-group-item bg-success text-white"><strong>Âge :</strong>
                            <?php
                            $age = $user->getAge();
                            echo $age !== null ? htmlspecialchars((string)$age) . ' ans' : '<em>Inconnu</em>';
                            ?>
                        </li>
                        <?php } else { ?>
                            <li class="list-group-item bg-danger text-white">Aucun user$user trouvé.</li>
                        <?php } ?>
                    </ul>
                    </li>
                </div>
            </div>
    </section>
    <section class="container text-center">
        <div class="row">
            <div class="col-12">
                <a href="user$userModif.php" class="btn btn-primary m-3 p-2">Modifier un user$user existant</a>
            </div>
        </div>
    </section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
