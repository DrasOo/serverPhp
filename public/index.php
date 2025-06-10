<?php
require_once '../bootstrap.php';
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Générateur de CV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link href="/css/style.css" rel="stylesheet">
</head>
<body>

<header class="bg-dark text-white m-3 rounded-5 p-3 shadow"> <!-- En-tête de la page -->
    <h1 class="display-1 text-center">Bienvenue sur un générateur de CV</h1>
    <div class="container-lg">
        <h2 class="display-3 text-center fs-3 mt-4 shadow">Cliquez sur le bouton pour accéder à la page !</>
    </div>

</header>
<div class="text-center m-5"> <!-- Bouton de redirection -->
    <a
            id="btnRedirect"
            class="btn text-white btn-info btn-lg shadow "
            href="cv.php"
            role="button"
    > Redirection vers le site.
    </a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous"></script>
</body>
</html>

