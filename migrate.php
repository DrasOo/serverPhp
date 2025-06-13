<?php
require_once 'bootstrap.php';
require_once SERVICE_PATH . '/DatabaseService.php';

$dbConfig = $config['db'] ?? $config;


try {
    // Connexion à MySQL sans sélectionner la BDD (pour la créer si besoin)
    $pdo = Database::connectWithoutDB($config);
    // Création de la base de données si elle n'existe pas
    $pdo->exec("CREATE DATABASE IF NOT EXISTS `{$dbConfig['dbname']}` CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci");
    echo "La base de données '{$dbConfig['dbname']}' est créée ou existe bien.\n";
    } catch (PDOException $e) {
    die("Erreur création BDD : " . $e->getMessage() . "\n");
}
    try {        
        // Création de la table users si elle n'existe pas
        $pdp = Database::connectWithDB($config);
        $pdp ->exec("
            CREATE TABLE IF NOT EXISTS users (
                id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(100) NOT NULL,
                firstName VARCHAR(100) NOT NULL,
                region VARCHAR(100),
                city VARCHAR(100),
                job VARCHAR(100),
                birth DATE,
                cellphone VARCHAR(20),
                email VARCHAR(200) NOT NULL UNIQUE,
                skills JSON
            )
        ");
        echo "La table 'users' est créée ou existe bien.\n";
        
        echo "Migration terminée avec succès !\n";
        
    } catch (PDOException $e) {
        die("Erreur création BDD : " . $e->getMessage() . "\n");
    }