<?php

class CvModel
{
    private int $id;
    private string $name;
    private string $firstName;
    private string $region;
    private ?string $city;
    private string $job;
    private string $birth;
    private string $cellphone;
    private array $skills;
    private string $email;

    public function __construct(
        int    $id,
        string $name,
        string $firstName,
        ?string $region,
        ?string $city,
        ?string $job,
        ?string $birth,
        ?string $cellphone,
        ?array  $skills,
        string $email
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->firstName = $firstName;
        $this->region = $region;
        $this->city = $city;
        $this->job = $job;
        $this->birth = $birth;
        $this->cellphone = $cellphone;
        $this->skills = $skills;
        $this->email = $email;
    }

    public static function fromArray(array $data): self
    {
        return new self(
            $data['id'] ?? 0,
            $data['name'] ?? '',
            $data['firstName'] ?? '',
            $data['region'] ?? '',
            $data['city'] ?? null,
            $data['job'] ?? '',
            $data['birth'] ?? '',
            $data['cellphone'] ?? '',
            is_array($data['skills'] ?? null) ? $data['skills'] : [],
            $data['email'] ?? '',
        );
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return strtoupper($this->name);
    }

    public function getFirstName(): string
    {
        return ucfirst($this->firstName);
    }

    public function getRegion(): ?string
    {
        return $this->region;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function getJob(): ?string
    {
        return $this->job;
    }

    public function getBirth(): ?string
    {
        $birth = $this->birth;

        // Vérifie que c'est une date valide au format Y-m-d
        $date = \DateTime::createFromFormat('Y-m-d', $birth);

        $isValidDate = $date && $date->format('Y-m-d') === $birth;
        if (!$isValidDate) {
            return null;
        }
        $birth = $date->format('d/m/Y'); // Formatage de la date au format français
        // Retourne la date formatée
        return $birth;

    }

    public function getCellphone(): ?string
    {
        return $this->cellphone;
    }

    public function getEmail(): string
    {
        return $this->email;
    }


    public function getSkills(): ?array
    {
    return is_array($this->skills) ? $this->skills : [];
    }


    public function getFullName(): string
    {
        return strtoupper($this->name) . ' ' . ucfirst($this->firstName);
    }

    /**
     * @throws \Exception
     */
    public function getAge(): ?int
    {
        if (!$this->birth) return null;

        try {
            $birthDate = new \DateTime($this->birth);
            return (new DateTime())->diff($birthDate)->y;
        } catch (\Exception $e) {
            //var_dump($e->getMessage());
            return null;
        }
    }
}
