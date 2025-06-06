<?php
require_once '../bootstrap.php';
require_once MODEL_PATH . '/CvModel.php';
require_once MODEL_PATH . '/modelPOO.php';
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
    <a class="btn btn-warning" href="/" role="button">Retour en arrière</a>
</header>

<section class="container text-center">
    <div class="row">
        <div class="col-12 bg-success text-white p-3 m-3 rounded shadow text-start min-vh-100">
            <h1 class="text-center mb-4">Votre CV généré</h1>

            <div class="row mb-3">
                <div class="col-4">
                    <img src="/img/profile.png" alt="Photo" class="img-fluid rounded ms-5" width="150" height="150">
                </div>
                <div class="col-8 text-end">
                    <h2>
                        <?= htmlspecialchars($firstName ?? '--') . ' ' . htmlspecialchars($name ?? '') ?>
                    </h2>
                    <h3>
                        Habite en <?= htmlspecialchars($region ?? '--') ?> à <?= !empty($city) ? htmlspecialchars($city) : '--' ?>
                    </h3>
                </div>
            </div>

            <div class="row">
                <div class="col-12 text-end">
                    <p><strong>Status :</strong> <?= !empty($job) ? htmlspecialchars($job) : '--' ?></p>
                    <p><strong>Date de naissance :</strong>
                        <?= htmlspecialchars($birth ?? '--') ?>
                        (<?= $age !== null ? $age . ' ans' : '<em>Âge inconnu</em>' ?>)
                    </p>
                    <p><strong>Compétences :</strong>
                        <?php if (!empty($skills)): ?>
                            <?= implode(', ', array_map('htmlspecialchars', $skills)) ?>
                        <?php else: ?>
                            <em>Aucune compétence renseignée</em>
                        <?php endif; ?>
                    </p>
                    <p><strong>Contact :</strong>
                        <?= filter_var($email, FILTER_VALIDATE_EMAIL)
                            ? htmlspecialchars($email)
                            : '<em>Email invalide ou absent</em>' ?>
                    </p>
                    <p><strong>Âge :</strong> <?= $age !== null ? htmlspecialchars((string)$age) . ' ans' : '<em>Inconnu</em>' ?></p>
                </div>
            </div>
        </div>
    </div>
    <?php 
    $dataList = getDataCv(); // Récupère les données
    $cv = new DataCV($dataList[0]); // Crée une instance avec le premier CV

    echo $cv->getBirth();
    ?>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
