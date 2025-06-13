<?php
require_once '../bootstrap.php';
require_once MODEL_PATH . '/UserModel.php';
require_once CONTROLLER_PATH . '/CvController.php';

   /* if (isset($_GET['ajax']) && $_GET['ajax'] === '1') {
        require_once CONFIG_PATH . '/parameters.php';
        require_once SERVICE_PATH . '/DatabaseService.php';

        $config = require CONFIG_PATH . '/parameters.php';
        $pdo = Database::connectWithDB($config);

        $stmt = $pdo->query("SELECT * FROM users");
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        header('Content-Type: application/json');
        echo json_encode(['data' => $users]);
        exit;
}*/
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Générateur de CV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css" rel="stylesheet">
    <!--<link href="/assets/css/style.css" rel="stylesheet">-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
    <script src="/assets/js/datatable-int.js"></script>
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
                    <table id="users-table" class="display">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Ville</th>
                            <th>Job</th>
                        </tr>
                        </thead>
                    </table>
                    </ul>
                    </li>
                </div>
            </div>
    </section>
    

<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    </body>
</html>
