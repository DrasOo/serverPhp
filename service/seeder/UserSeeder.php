<?php

// namespace App\service\Seeder;

class UserSeeder
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    public function seed(): void
    {
        try {
            // Vérifier si des données existent avec la function hasData()
            // Si des données existent, on ne fait pas de seeding (Si il y a déjà des utilisateurs, ca n'en réinsère pas)
            if ($this->hasData()) {
                echo "Des données existent déjà dans la table users.\n";
                die;
            }

            $fakeUsers = $this->getFakeUsers(); // On récupère les données fictives
            
            foreach ($fakeUsers as $user) { // On boucle sur chaque donnée fictive et on les insère dans la base de données
                $this->insertUser($user);
            }

            echo count($fakeUsers) . " utilisateurs fictifs insérés avec succès.\n";
            
        } catch (PDOException $e) {
            throw new Exception("Erreur lors du seeding : " . $e->getMessage());
        }
    }

    
    private function hasData(): bool      //Vérifie s'il y a déjà des données dans la table

    {
        $stmt = $this->pdo->query("SELECT COUNT(*) FROM users");
        return $stmt->fetchColumn() > 0;
    }

    
    //Retourne les données fictives
     
    private function getFakeUsers(): array // Simule des données fictives dans un tableau 
    {
        return [
            [
                'name' => 'Martin',
                'first_name' => 'Enzo',
                'region' => 'Pays de la Loire',
                'city' => 'Angers',
                'job' => 'Étudiant',
                'birth' => '2005-06-03',
                'cellphone' => '0612345678',
                'email' => 'enzo.martin@gmail.com',
                'skills' => json_encode(['PHP 8', 'JavaScript', 'HTML', 'MySQL']),
            ],
            [
                'name' => 'Dupont',
                'first_name' => 'Sophie',
                'region' => 'Bretagne',
                'city' => 'Rennes',
                'job' => 'Développeuse Symfony',
                'birth' => '1998-02-14',
                'cellphone' => '0699887766',
                'email' => 'sophie.dupont@gmail.com',
                'skills' => json_encode(['Symfony', 'React', 'Docker']),
            ],
        ];
    }

    
    //Insère un utilisateur dans la base de données
     
    private function insertUser(array $user): void // avec les données fictives de getFakeUsers() on insert dans la base de données
    {
        $stmt = $this->pdo->prepare(" 
            INSERT INTO users (name, firstName, region, city, job, birth, cellphone, email, skills)
            VALUES (:name, :firstName, :region, :city, :job, :birth, :cellphone, :email, :skills)
        ");

        $success = $stmt->execute([ // On prépare la requête avec les données fictives et on l'exécute
            ':name' => $user['name'],
            ':firstName' => $user['first_name'],
            ':region' => $user['region'],
            ':city' => $user['city'],
            ':job' => $user['job'],
            ':birth' => $user['birth'],
            ':cellphone' => $user['cellphone'],
            ':email' => $user['email'],
            ':skills' => $user['skills'],
        ]);

        if (!$success) {
            throw new PDOException("Erreur lors de l'insertion de l'utilisateur : " . $user['email']);
        }

        echo "L'utilisateur {$user['first_name']} {$user['name']} ajouté.\n";
    }
}