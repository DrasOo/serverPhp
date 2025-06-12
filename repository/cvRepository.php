<?php
require_once MODEL_PATH . '/UserModel.php';

class CvRepository
{
    private array $userList = [];

    public function __construct(string $source = 'array')
    {
        $this->load($source);
    }

    private function load(string $source): void
    {
        switch ($source) {
            case 'json':
                $this->loadFromJsonFile(DATA_PATH . '/data.json');
                break;
            case 'fake_db':
                $this->loadFromFakeDatabase(DATA_PATH . '/data.php');
                break;
            case 'array':
                $this->loadFromArray(DATA_PATH . '/data.php');
                break;
            default:
                throw new InvalidArgumentException("Source inconnue : $source");
        }
    }


    // 1. Source manuelle
    private function loadFromArray(string $filePath): void
    {
        if (!file_exists($filePath)) return;

        // 🧠 Inclut le fichier PHP et récupère le tableau $users défini dedans
        $data = include $filePath;

        if (is_array($data)) {
            foreach ($data as $row) {
                if (is_array($row)) {
                    $this->userList[] = UserModel::fromArray($row);
                }
            }
        }
    }


    // 2. Source JSON locale (type API)
    private function loadFromJsonFile(string $filePath): void
    {
        if (!file_exists($filePath)) return;

        $json = file_get_contents($filePath);
        $data = json_decode($json, true);

        if (is_array($data)) {
            foreach ($data as $row) {
                $this->userList[] = UserModel::fromArray($row);

            }
        }
    }

    // 3. Source simulée d'une base de données
    private function loadFromFakeDatabase(string $filePath): void
    {
        if (!file_exists($filePath)) return;
        // Inclut le fichier PHP et récupère les données simulées
        $data = require $filePath; // Assure que le fichier retourne un tableau
        if (is_array($data)) {
            foreach ($data as $row) {
                $this->userList[] = UserModel::fromArray($row);
            }
        }
    }


    // Accès aux données
    public function findAll(): array
    {
        return $this->userList;
    }

    public function findById(int $id): ?UserModel
    {
        foreach ($this->userList as $user) {
            if ($user->getId() === $id) {
                return $user;
            }
        }
        return null;
    }
}

