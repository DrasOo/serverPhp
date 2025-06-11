<?php
require_once MODEL_PATH . '/CvModel.php';

class CvRepository
{
    private array $cvList = [];

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
                $this->loadFromFakeDatabase();
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

        // 🧠 Inclut le fichier PHP et récupère le tableau $cvs défini dedans
        $data = include $filePath;

        if (is_array($data)) {
            foreach ($data as $row) {
                if (is_array($row)) {
                    $this->cvList[] = CvModel::fromArray($row);
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
                $this->cvList[] = CvModel::fromArray($row);

            }
        }
    }

    // 3. Source simulée d'une base de données
    private function loadFromFakeDatabase(): void
    {
        $rows = [
            [
                'id' => 1,
                'name' => 'Dupont',
                'firstname' => 'Alice',
                'region' => 'Bretagne',
                'city' => 'Rennes',
                'job' => 'Développeuse PHP',
                'birth' => '1995-04-22',
                'skills' => ['PHP', 'Laravel'],
                'email' => 'alice.dupont@example.com'
            ]
        ];

        foreach ($rows as $row) {
            $this->cvList[] = CvModel::fromArray($row);
        }
    }


    // Accès aux données
    public function findAll(): array
    {
        return $this->cvList;
    }

    public function findById(int $id): ?CvModel
    {
        foreach ($this->cvList as $cv) {
            if ($cv->getId() === $id) {
                return $cv;
            }
        }
        return null;
    }
}

