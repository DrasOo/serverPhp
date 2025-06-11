<?php
require_once 'bootstrap.php';
require_once SERVICE_PATH . '/DatabaseService.php';
require_once CONFIG_PATH . '/config.php';

$config = require CONFIG_PATH . '/config.php';

try {
    // Connexion sans sélectionner la BDD (pour la créer si besoin)
    $pdo = Database::connectWithDB($config);

    $pdo->exec("CREATE DATABASE IF NOT EXISTS `{$config['dbname']}` CHARACTER SET {$config['charset']} COLLATE {$config['charset']}_general_ci");
    echo "Base de données '{$config['dbname']}' créée.\n";
} catch (PDOException $e) {
    die("Erreur création base de données : " . $e->getMessage());
    }

   