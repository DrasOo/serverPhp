<?php
require_once MODEL_PATH . '/MakeUserModel.php';
require_once SERVICE_PATH . '/DatabaseService.php';

class CvRepository
{
    private array $userList = [];

    public function __construct(/*string $source = 'array'*/)
    {
        $this->insert();
    }

    private function insert(UserModel $user): void
{
    $config = require CONFIG_PATH . '/parameters.php';
    $pdo = Database::connectWithDB($config);

    $stmt = $pdo->query(
    'INSERT INTO users (name, first_name, region, city, job, birth, cellphone, skills, email)
    VALUES (":name", ":first_name", ":region", ":city", ":job", ":birth", ":cellphone", ":skills", ":email")');
    $stmt->execute([
        'name' => $user->getName(),
        'first_name' => $user->getFirstName(),
        'region' => $user->getRegion(),
        'city' => $user->getCity(),
        'job' => $user->getJob(),
        'birth' => $user->getBirthDay(),
        'cellphone' => $user->getCellphone(),
        'skills' => json_encode($user->getSkills()), // je ne sais plus si c'est un array
        'email' => $user->getEmail(),
    ]
    );

}

}

