<?php 
require_once '../bootstrap.php';

class DataCV {
    private $id;
    private $name;
    private $firstName;
    private $region;
    private $city;
    private $job;
    private $birth;
    private $skills;
    private $email;

    public function __construct($data) {
        $this->id = $data['id'] ?? null; 
        $this->name = $data['name'] ?? null;
        $this->firstName = $data['firstName'] ?? null;
        $this->region = $data['region'] ?? null;
        $this->city = $data['city'] ?? null;
        $this->job = $data['job'] ?? null;
        $this->birth = $data['birth'] ?? null;
        $this->skills = (isset($data['skills']) && is_array($data['skills'])) ? $data['skills'] : [];
        $this->email = $data['email'] ?? null;
    }

    public function getId(): ?string {
        return $this->id;
    }

    public function getName(): ?string {
        return $this->name;
    }

    public function getFirstName(): ?string {
        return $this->firstName;
    }

    public function getRegion(): ?string {
        return $this->region;
    }

    public function getCity(): ?string {
        return $this->city;
    }

    public function getJob(): ?string {
        return $this->job;
    }

    public function getBirth(): ?string {
        return $this->birth;
    }

    public function getSkills():array {
        return $this->skills;
    }

    public function getEmail(): ?string {
        return $this->email;
    }

    public function getAge(): int|null {
        if ($this->birth) {
            $birthDate = new DateTime($this->birth);
            $currentDate = new DateTime();
            $age = $currentDate->diff($birthDate);
            return $age->y; // Retourne l'âge en années (y = années, m = mois, d = jours)
        }
        else 
        return  null; // Si la date de naissance n'est pas définie, retourne null
        }
}