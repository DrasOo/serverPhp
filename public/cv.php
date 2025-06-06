<?php
// Permet de ne pas quitter le dossier public
// et de charger les fichiers nécessaires pour le fonctionnement du CV
// On inclut le fichier bootstrap.php pour charger les dépendances et la configuration
// On inclut le contrôleur CvController pour gérer la logique du CV
// On inclut la vue cv_view.php pour afficher le CV
require_once '../bootstrap.php';
require_once CONTROLLER_PATH . '/CvController.php';
require_once SERVICE_PATH . '/baseService.php'; // Import de la fonction getValue et getAge
include VIEW_PATH . '/cv_view.php';
