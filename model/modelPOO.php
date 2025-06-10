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
        $this->id = array_key_exists('id', $data) ? $data['id'] : null;
        $this->name = array_key_exists('name', $data) ? $data['name'] : null;
        $this->firstName = array_key_exists('firstName', $data) ? $data['firstName'] : null;
        $this->region = array_key_exists('region', $data) ? $data['region'] : null;
        $this->city = array_key_exists('city', $data) ? $data['city'] : null;
        $this->job = array_key_exists('job', $data) ? $data['job'] : null;
        $this->birth = array_key_exists('birth', $data) ? $data['birth'] : null;
        $this->skills = array_key_exists('skills', $data) && is_array($data['skills']) ? $data['skills'] : [];
        $this->email = array_key_exists('email', $data) ? $data['email'] : null;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getRegion() {
        return $this->region;
    }

    public function getCity() {
        return $this->city;
    }

    public function getJob() {
        return $this->job;
    }

    public function getBirth() {
        return $this->birth;
    }

    public function getSkills() {
        return $this->skills;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getAge() {
        if ($this->birth) {
            $birthDate = new DateTime($this->birth);
            $currentDate = new DateTime();
            $age = $currentDate->diff($birthDate);
            return $age->y; // Retourne l'âge en années (y = années, m = mois, d = jours)
        }
    }
}