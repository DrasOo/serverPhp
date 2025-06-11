<?php

class CvModel
{
    private int $id;
    private string $name;
    private string $firstname;
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
        string $firstname,
        string $region,
        ?string $city,
        string $job,
        string $birth,
        string $cellphone,
        array  $skills,
        string $email,
        string $age
    )
    {
        $this->id = $id;
        $this->name = $name;
        $this->firstname = $firstname;
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
            $data['firstname'] ?? '',
            $data['region'] ?? '',
            $data['city'] ?? null,
            $data['job'] ?? '',
            $data['birth'] ?? '',
            $data['cellphone'] ?? '',
            is_array($data['skills'] ?? null) ? $data['skills'] : [],
            $data['email'] ?? '',
            $age = $data['age'] ?? ''
        );
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function getRegion(): string
    {
        return $this->region;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function getJob(): string
    {
        return $this->job;
    }

    public function getBirth(): string
    {
        return $this->birth;
    }

    public function getCellphone(): string
    {
        return $this->cellphone;
    }

    public function getEmail(): string
    {
        return $this->email;
    }


    public function getSkills(): array
    {
        return $this->skills;
    }


    public function getFullName(): string
    {
        return $this->name . ' ' . $this->firstname;
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
