<?php
require_once '../bootstrap.php';
require_once MODEL_PATH . '/CvModel.php';
require_once CONTROLLER_PATH . '/safeValue.php'; // Import de la fonction safeValue
require_once CONTROLLER_PATH . '/getAge.php'; // Import de la fonction getAge

$cv = getDataCv(); // Récupération des données du CV
$firstCv = $cv[0]; // On prend le premier CV pour l'affichage
// On utilise la fonction safeValue pour sécuriser les données
// et éviter les erreurs si une clé n'existe pas dans le tableau
$id        = getValueSafe($firstCv, 'id');
$name      = getValueSafe($firstCv, 'name');
$firstName = getValueSafe($firstCv, 'firstName');
$region    = getValueSafe($firstCv, 'region');
$city      = getValueSafe($firstCv, 'city');
$job       = getValueSafe($firstCv, 'job');
$birth     = getValueSafe($firstCv, 'birth');
$skills    = getValue($firstCv, 'skills');
if ($skills === null || !is_array($skills)) {
    $skills = ['Aucune compé']; // Fallback logique ici
    }
 // Note: $skills est un tableau, donc on l'utilisera différemment pour l'affichage
$email     = getValueSafe($firstCv, 'email');
$age       = getAge($birth); // Calcul de l'âge à partir de la date de naissance

