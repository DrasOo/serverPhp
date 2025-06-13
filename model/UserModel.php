<?php
class UserModel
{
    private int $id;
    private string $name;
    private string $firstName;
    private ?string $region;
    private ?string $city;
    private ?string $job;
    private ?DateTimeImmutable $birth;
    private ?string $cellphone;
    private array $skills;
    private string $email;

    public function __construct(
        int $id,
        string $name,
        string $firstName,
        ?string $region,
        ?string $city,
        ?string $job,
        ?DateTimeImmutable $birth,
        ?string $cellphone,
        ?array $skills,
        string $email
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->firstName = $firstName;
        $this->region = $region;
        $this->city = $city;
        $this->job = $job;
        $this->birth = $birth;
        $this->cellphone = $cellphone;
        $this->skills = $skills ?? [];
        $this->email = $email;
    }

    public static function fromArray(array $data): self
    {
        $birth = null;
        if (!empty($data['birth'])) {
            try {
                $birth = new DateTimeImmutable($data['birth']);
            } catch (Exception) {
                $birth = null;
            }
        }

        return new self(
            (int)($data['id'] ?? 0),
            $data['name'] ?? '',
            $data['first_name'] ?? '',
            $data['region'] ?? null,
            $data['city'] ?? null,
            $data['job'] ?? null,
            $birth,
            $data['cellphone'] ?? null,
            is_array($data['skills'] ?? null) ? $data['skills'] : [],
            $data['email'] ?? ''
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

    public function getCellphone(): ?string
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
    public function getBirthDay(?string $format = 'Y-m-d'): ?string
    {
        return $this->birth?->format($format);
    }

    public function getFullName(): string
    {
        return $this->name . ' ' . $this->firstName;
    }

    public function getAge(): ?int
    {
        if (!$this->birth) return null;

        return $this->birth->diff(new DateTimeImmutable())->y;
    }
}