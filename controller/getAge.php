<?php

function getAge($birthDate) {
    // Convertit la date de naissance en objet DateTime
    $birth = new DateTime($birthDate);
    // Obtient la date actuelle
    $now = new DateTime();
    // Calcule la différence entre les deux dates
    $age = $now->diff($birth);
    return $age->y; //y retourne l'âge en années (m retourne les mois, d les jours)
}