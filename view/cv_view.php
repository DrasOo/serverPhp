<?php
require_once '../bootstrap.php';
require_once CONTROLLER_PATH . '/CvController.php'; 
?>


<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Générateur de cv</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <link href="\css\style.css" rel="stylesheet">
    </head>
    <body>
        <header class="row ms-2 me-2 mt-2 mb-3"> <!-- Bouton retour vers page accueil -->
            <a
                id="btnRetour"
                class="btn btn-warning "
                href="/"
                role="button"
                >Retour en arrière</a
            >
            
        </header>
        <section class="container text-center">
            <div class="row">                
                    <div class="col-12 bg-success text-white p-3 m-3 rounded shadow text-start min-vh-100 ">
                        <h1 class="text-center mb-4">Votre cv généré</h1>

                        <!-- Ligne du haut avec 2 colonnes -->
                        <div class="row mb-3">
                            <!-- Image à gauche -->
                            <div class="col-4">
                                <img src="/img/profile.png" alt="Photo" class="img-fluid rounded ms-5" width="150" height="150">
                            </div>

                            <!-- titres à droite -->
                            <div class="col-8 text-end">
                                <?php
                                // Affichage des informations du CV et sécurisation des données avec htmlspecialchars
                                echo "<h2>". htmlspecialchars($name)." ". htmlspecialchars($firstName). "</h2>";
                                echo "<h3>Habite en ".htmlspecialchars($region)." à ".htmlspecialchars($city)."</h3>";
                                ?>
                            </div>
                        </div>

                        <!-- Ligne du bas, texte-->
                        <div class="row">
                            <!-- texte à gauche -->
                                <div class="col-12 text-end">
                                    <?php
                                    // Affichage des informations du CV et sécurisation des données avec htmlspecialchars
                                    echo "<p><strong>Status : </strong>".htmlspecialchars($job)."</p>";
                                    echo "<p><strong>Date de naissance : </strong>".htmlspecialchars($birth)."</p>";?>
                                    
                                    <p><strong>Compétences :</strong> <!-- Vérification si le tableau de compétences n'est pas vide -->
                                        <?php if (!empty($skills) && is_array($skills)): ?>
                                            <?= implode(', ', array_map('htmlspecialchars', $skills)) ?>
                                        <?php else: ?> <!-- Si le tableau est vide ou n'est pas un tableau -->
                                            <em>Aucune compétence renseignée</em>
                                        <?php endif; ?>
                                    </p>
                                    
                                    <p><strong>Contact :</strong> <!-- Vérification de l'email avec un email valide donc @ et . obligatoire -->
                                        <?= filter_var($email, FILTER_VALIDATE_EMAIL)
                                            ? htmlspecialchars($email) 
                                            : '<em>Email invalide ou absent</em>' ?> <!-- Si l'email n'est pas valide, on affiche un message d'erreur -->
                                    </p>
                                    <?php
                                    echo "<p><strong>Âge : </strong>". htmlspecialchars($age) . " ans</p>";
                                    ?>
                                </div>
                        </div>
                    </div>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </body>
</html>
