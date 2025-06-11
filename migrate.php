<?php
require_once 'bootstrap.php';
require_once SERVICE_PATH . '/DatabaseService.php';
require_once CONFIG_PATH . '/config.php';

$config = require CONFIG_PATH . '/config.php';

try {
    // Connexion sans sélectionner la BDD (pour la créer si besoin)
    $pdo = Database::connectWithDB($config);

    $pdo->exec("CREATE DATABASE IF NOT EXISTS `{$config['dbname']}` CHARACTER SET {$config['charset']} COLLATE {$config['charset']}_general_ci");
    echo "Base de données '{$config['dbname']}' vérifiée/créée.\n";
} catch (PDOException $e) {
    die("Erreur création base de données : " . $e->getMessage());
    }

    try {
    // Connexion à la base maintenant existante
    $pdo = Database::connectWithDB($config);

    $sql = <<<SQL
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
        email VARCHAR(200) NOT NULL UNIQUE
    ) ENGINE=InnoDB DEFAULT CHARSET={$config['charset']};
    SQL;

    $pdo->exec($sql);
    echo "✅ Table 'users' vérifiée/créée avec succès.\n";
}
    catch (PDOException $e) {
    die("Erreur création table 'users' : " . $e->getMessage());
    }