<?php
require_once '../bootstrap.php';
$route = $_GET['route'] ?? 'home';
// un petit switch comme on aime bien :D
switch ($route) {
    case 'index':
        // Permet de ne pas quitter le dossier public
        // et de charger les fichiers nécessaires pour le fonctionnement du CV
        // On inclut le fichier bootstrap.php pour charger les dépendances et la configuration
        // On inclut le contrôleur CvController pour gérer la logique du CV
        // On inclut la vue cv_view.php pour afficher le CV
        require_once CONTROLLER_PATH . '/CvController.php';
        include CV_PATH . '/index.php';
        break;
    case 'edit':
        require_once CONTROLLER_PATH . '/CvController.php';
        include CV_PATH . '/edit.php';
        break;
    case 'home':
        require_once CONTROLLER_PATH . '/HomeController.php';
        include VIEW_PATH . '/home.php';
        break;
    case 'show':
        require_once CONTROLLER_PATH . '/CvController.php';
        include CV_PATH . '/show.php';
        break;
    
    default:
        echo "Page d'accueil";
    }

