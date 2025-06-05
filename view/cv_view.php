<?php
include '../controller/CvController.php';
?>


<!doctype html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Générateur de cv</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
        <div class="container text-center">
            <div class="row">
                <div class="col">
                    
                </div>
                
                    <div class="col-14 bg-primary text-white p-3 m-3 rounded shadow text-start min-vh-100 ">
                        <h1 class="text-center mb-4">Votre cv générer</h1>

                        <!-- Ligne du haut avec 2 colonnes -->
                        <div class="row mb-3">
                            <!-- Image à gauche -->
                            <div class="col-4">
                                <img src="../assets/profile.png" alt="Photo" class="img-fluid rounded ms-5" width="150" height="150">
                            </div>

                            <!-- titres à droite -->
                            <div class="col-8 text-end">
                                <?php
                                echo "<h2>$name $firstName</h2>";
                                echo "<h3>Habite en $region à $city</h3>";
                                ?>
                            </div>
                        </div>

                        <!-- Ligne du bas, texte-->
                        <div class="row">
                            <!-- texte à gauche -->
                                <div class="col-12 text-end">
                                    <?php
                                    echo "<p>$job</p>";
                                    echo "<p>$birth</p>";
                                    echo "<p>Compétences : ";
                                    foreach($skills as $skill){
                                        echo $skill . ", ";
                                    }
                                    echo "</p>";
                                    echo "<p>Contact : $email</p>";
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col">
                    
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </body>
</html>
