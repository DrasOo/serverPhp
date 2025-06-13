<?php
$config = require CONFIG_PATH . '/config.php';

class Database
{
    // Connexion avec sélection de la base de données
    public static function connectWithDB(array $config): PDO
    {
        $dbConfig = $config['db'] ?? $config; //si la clé 'db' n'existe pas, on utilise la configuration principale
        
        $dsn = "mysql:host={$dbConfig['host']};dbname={$dbConfig['dbname']};charset=utf8mb4";

        try {
            return new PDO(
                $dsn,
                $dbConfig['user'],
                $dbConfig['pass'],
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false
                ]
            );
        } catch (PDOException $e) {
            throw new PDOException("Connexion impossible : " . $e->getMessage());
        }
    }

    // Connexion sans sélection de base de données (utile pour créer la BDD)
    public static function connectWithoutDB(array $config): PDO
    {
        $dbConfig = $config['db'] ?? $config; // si la clé 'db' n'existe pas, on utilise la configuration principale
        
        $dsn = "mysql:host={$dbConfig['host']};charset=utf8mb4";

        try {
            return new PDO(
                $dsn,
                $dbConfig['user'],
                $dbConfig['pass'],
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
        } catch (PDOException $e) {
            throw new PDOException("Connexion serveur impossible : " . $e->getMessage());
        }
    }
}