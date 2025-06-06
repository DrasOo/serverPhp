<?php

// Utilisé getValueSafe pour vérifier la présence d'une clé dans une variable
function getValueSafe(array $tableau, string $variable, $description = '(Aucune valeur renseignée)') {
    // Verifie si la clé existe dans le tableau et retourne sa valeur ou une description par défaut
    return !empty($tableau[$variable]) ? $tableau[$variable] : $description;
}
 
// Utilisé getValue pour vérifier si la variable est un tableau et retourner sa valeur ou sinon null (utilisé après dans le controller)
function getValue(array $arr, string $key) {
    return array_key_exists($key, $arr) ? $arr[$key] : null;
}

