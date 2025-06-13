<?php
require_once '../bootstrap.php';
require_once MODEL_PATH . '/UserModel.php';
require_once CONTROLLER_PATH . '/CvController.php';
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Générateur de CV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="public\assets\css\style.css" rel="stylesheet">
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
                    <ul class="list-group">
                    </ul>
                    </li>
                </div>
            </div>
    </section>
    <section class="container text-center">
        <div class="row">
            <div class="col-12">
                <a href="/?route=show" class="btn btn-primary m-3 p-2">Affiche un CV existant</a>
            </div>
        </div>
    </section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
