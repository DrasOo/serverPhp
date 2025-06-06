<?php
require_once '../bootstrap.php';
require_once MODEL_PATH . '/CvModel.php';
require_once CONTROLLER_PATH . '/safeValue.php'; // Import de la fonction safeValue
require_once CONTROLLER_PATH . '/getAge.php'; // Import de la fonction getAge

$cv = getDataCv(); // Récupération des données du CV
$firstCv = $cv[0]; // On prend le premier CV pour l'affichage
// On utilise la fonction safeValue pour sécuriser les données
// et éviter les erreurs si une clé n'existe pas dans le tableau
$id        = verifValeur($firstCv, 'id');
$name      = verifValeur($firstCv, 'name');
$firstName = verifValeur($firstCv, 'firstName');
$region    = verifValeur($firstCv, 'region');
$city      = verifValeur($firstCv, 'city');
$job       = verifValeur($firstCv, 'job');
$birth     = verifValeur($firstCv, 'birth');
$skills    = verifValeur($firstCv, 'skills','(Aucune compé)'); // Note: $skills est un tableau, donc on l'utilisera différemment pour l'affichage
$email     = verifValeur($firstCv, 'email');
$age       = getAge($birth); // Calcul de l'âge à partir de la date de naissance

