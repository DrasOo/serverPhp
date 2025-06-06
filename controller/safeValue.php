<?php
function verifValeur(array $tableau, string $variable, $description = '(Aucune valeur renseignée)') {
    // Verifie si la clé existe dans le tableau et retourne sa valeur ou une description par défaut
    return !empty($tableau[$variable]) ? $tableau[$variable] : $description;
}
