<?php
require_once '../bootstrap.php';
require_once MODEL_PATH . '/CvModel.php';
require_once SERVICE_PATH . '/baseService.php'; // Import de la fonction safeValue et import de la fonction getAge

$cv = getDataCv(); // Récupération des données du CV
$firstCv = $cv[0]; // On prend le premier CV pour l'affichage
// On utilise la fonction safeValue pour sécuriser les données
// et éviter les erreurs si une clé n'existe pas dans le tableau
$id = getValue($firstCv, 'id');
$name = getValue($firstCv, 'name');
$firstName = getValue($firstCv, 'firstName');
$region = getValue($firstCv, 'region');
$city = getValue($firstCv, 'city');
$job = getValue($firstCv, 'job');
$birth = getValue($firstCv, 'birth');
$skills = getValue($firstCv, 'skills');
$email = getValue($firstCv, 'email');
$age = getAge($birth); // Calcul de l'âge à partir de la date de naissance

// fallback skills si nécessaire
if ($skills === null || !is_array($skills)) {
    $skills = []; // Si le $skills n'est pas un tableau, on initialise à un tableau vide grâce à getValue et is_array
}


