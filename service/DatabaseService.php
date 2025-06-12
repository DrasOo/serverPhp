<?php
class Database
{
   
    public function __construct()
    { 
        
    }
    public static function connectWithDB(array $config): PDO
    {
        $dsn = "mysql:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";

        return new PDO(
            $dsn,
            $config['user'],
            $config['password'],
        );
    }
    


    
}