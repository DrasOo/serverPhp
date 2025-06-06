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
        $this->id = isset($data['id']) ? $data['id'] : null;
        $this->name = isset($data['name']) ? $data['name'] : null;
        $this->firstName = isset($data['firstName']) ? $data['firstName'] : null;
        $this->region = isset($data['region']) ? $data['region'] : null;
        $this->city = isset($data['city']) ? $data['city'] : null;
        $this->job = isset($data['job']) ? $data['job'] : null;
        $this->birth = isset($data['birth']) ? $data['birth'] : null;
        $this->skills = isset($data['skills']) && is_array($data['skills']) ? $data['skills'] : [];
        $this->email = isset($data['email']) ? $data['email'] : null;
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
}