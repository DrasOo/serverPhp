<?php
require_once '../bootstrap.php';
require_once MODEL_PATH . '/UserModel.php';
require_once CONTROLLER_PATH . '/CvController.php';
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Ajoutez un CV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="public\assets\css\style.css" rel="stylesheet">
</head>
<body>
<?php include VIEW_PATH . '/header.php'; ?>
<section class="container text-center">
    <div class="row">
        <div class="col-12 bg-success text-white p-3 m-3 rounded shadow text-start min-vh-100">
            <h1 class="text-center mb-4 ">Ajoutez un CV</h1>

            <div class="row mb-3">
                <div class="col-4">
                    <img src="assets/img/profile.png" alt="Photo" class="img-fluid rounded ms-5" width="150" height="150">
                </div>
                <form class="user-form" id="userForm">
                    <li class="list-group p-3 d-flex"> <!-- Formulaire d'ajout de CV -->
                        <ul class="list-group">
                            <li class="list-group-item bg-success text-white rounded">
                                <div class="input-group has-validation">
                                    <span class="input-group-text">👤</span>
                                    <div class="form-floating is-invalid">
                                        <input type="text" class="form-control is-invalid" id="prenom" placeholder="Prénom" required>
                                        <label for="prenom">Prénom</label>
                                    </div>
                                    <div class="invalid-feedback bg-white p-2 rounded">
                                        Votre prénom est obligatoire.
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item bg-success text-white rounded">
                                <div class="input-group has-validation">
                                    <span class="input-group-text">👤</span>
                                    <div class="form-floating is-invalid">
                                        <input type="text" class="form-control is-invalid" id="nom" placeholder="Nom" required>
                                        <label for="nom">Nom</label>
                                    </div>
                                    <div class="invalid-feedback bg-white p-2 rounded">
                                        Votre nom est obligatoire.
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item bg-success text-white rounded">
                                <div class="input-group">
                                    <span class="input-group-text">🌍</span>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="region" placeholder="Région">
                                        <label for="region">Région</label>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item bg-success text-white rounded">
                                <div class="input-group">
                                    <span class="input-group-text">🏙️</span>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="city" placeholder="Ville">
                                        <label for="city">Ville</label>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item bg-success text-white rounded">
                                <div class="input-group">
                                    <span class="input-group-text">🎂</span>
                                    <div class="form-floating">
                                        <input type="date" class="form-control" id="birthday" placeholder="Date de naissance">
                                        <label for="birthday">Date de naissance</label>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item bg-success text-white rounded">
                                <div class="input-group has-validation">
                                    <span class="input-group-text">@</span>
                                    <div class="form-floating is-invalid">
                                        <input type="email" class="form-control is-invalid" id="email" placeholder="Email" required>
                                        <label for="email">Email</label>
                                    </div>
                                    <div class="invalid-feedback bg-white p-2 rounded">
                                        Votre email est obligatoire.
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item bg-success text-white rounded">
                                <div class="input-group">
                                    <span class="input-group-text">💼</span>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="job" placeholder="Métier">
                                        <label for="job">Métier</label>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item bg-success text-white rounded">
                                <div class="input-group">
                                    <span class="input-group-text">🛠️</span>
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="skills" placeholder="Compétences">
                                        <label for="skills">Compétences</label>
                                    </div>
                                </div>
                            </li> 
                        </ul> <!-- Bouton d'envoi du formulaire -->
                        <button class="btn btn-primary mt-3" id="submitBtn">Ajouter le CV</button>
                        </li>  <!-- Fin du formulaire d'ajout de CV -->
                    </form>
                </div>
            </div>
    </section>
    <div class="d-flex">
        <section class="container text-center">
            <div class="row">
                <div class="col-12">
                    <a href="/?route=edit" class="btn btn-primary m-3 p-2">Modifier votre CV</a>
                </div>
            </div>
        </section>
        <section class="container text-center">
            <div class="row">
                <div class="col-12">
                    <a href="/?route=show" class="btn btn-primary m-3 p-2">Voir votre cv</a>
                </div>
            </div>
        </section>
        <section class="container text-center">
            <div class="row">
                <div class="col-12">
                    <a href="/?route=make" class="btn btn-primary m-3 p-2">Créer un nouveau CV</a>
                </div>
            </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>