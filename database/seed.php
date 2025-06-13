<?php
require_once 'bootstrap.php';
require_once SERVICE_PATH . '/DatabaseService.php';
require_once CONFIG_PATH . '/parameters.php';
require_once SEEDER_PATH . '/UserSeeder.php';

$config = require CONFIG_PATH . '/parameters.php';

try {
    // Connexion à la base de données
    $pdo = Database::connectWithDB($config);
    
    $dbConfig = $config['db'] ?? $config;
    
    // Sélection de la base de données
    $pdo->exec("USE `{$dbConfig['dbname']}`");
    
    // Initialisation et exécution du seeder
    $seeder = new UserSeeder($pdo);
    $seeder->seed();
    
    echo "Seeding terminé avec succès !\n";
    
} catch (PDOException $e) {
    die("Erreur lors du seeding : " . $e->getMessage() . "\n");
} catch (Exception $e) {
    die("Erreur générale : " . $e->getMessage() . "\n");
}