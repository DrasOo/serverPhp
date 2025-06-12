<?php

// namespace App\service\Seeder;

use PDO;

class UserSeeder
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function seed(): void
    {
        $fakeUsers = [
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
            ]
        ];
         foreach ($fakeUsers as $user) {
            $this->insertUser($user);
        }

        echo "✅ Données factices insérées.\n";
    }

    private function insertUser(array $user): void
    {
       $stmt = $this->pdo->prepare("
            INSERT INTO users (name, firstName, region, city, job, birth, cellphone,email,skills )
            VALUES (:name, :firstName, :region, :city, :job, :birth, :cellphone,:email,:skills )
        ");

        $stmt->execute([
            ':name' => $user['name'],
            ':firstName' => $user['firstName'],
            ':region' => $user['region'],
            ':city' => $user['city'],
            ':job' => $user['job'],
            ':birth' => $user['birth'],
            ':cellphone' => $user['cellphone'],
            ':skills' => $user['skills'],
            ':email' => $user['email'],
        ]);
    }
}