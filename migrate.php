<?php
require_once 'bootstrap.php';
require_once SERVICE_PATH . '/DatabaseService.php';
require_once CONFIG_PATH . '/config.php';
require_once SEEDER_PATH . '/UserSeeder.php';

$config = require CONFIG_PATH . '/config.php';


    // Connexion sans sélectionner la BDD (pour la créer si besoin)
    $pdo = Database::connectWithDB($config);

    $pdo->exec("CREATE DATABASE IF NOT EXISTS `{$config['dbname']}` CHARACTER SET {$config['charset']} COLLATE {$config['charset']}_general_ci");
    echo "La base de données '{$config['dbname']}' est créée ou existe bien.\n";

    $pdo->exec("
    CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        firstName VARCHAR(100) NOT NULL,
        region VARCHAR(100),
        city VARCHAR(100),
        job VARCHAR(100),
        birth DATE,
        cellphone VARCHAR(20),
        skills VARCHAR(200), 
        email VARCHAR(200) NOT NULL UNIQUE");
    echo "La table 'users' est créée ou existe bien.\n";
    
    $seeder = new UserSeeder($pdo);
    $seeder->insertUser();