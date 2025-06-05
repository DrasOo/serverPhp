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
                    <div class="col-8 bg-primary text-white p-3 rounded shadow text-start"> <!-- Centre de la page-->
                    <h1 class="text-center">Votre cv généré</h1>
                    <div class="col">
                        <?php
                        echo "<h2 class='text-end' >$name $firstName</h2>";
                        echo "<h3 class='text-end'>Habite en $region à $city</h3>";
                        echo "<p>$job</p>";
                        echo "<p>$birth</p>";
                        foreach($skills as $skill){
                            echo $skill,",";}
                        echo"<p>$email</p>";
                          ?>
                    </div>
                </div>
                <div class="col">
                    
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
    </body>
</html>
