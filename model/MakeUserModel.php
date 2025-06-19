<?php

class MakeUserModel
{
    //private int $id;
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
        //int $id,
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
        //$this->id = $id;
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
    public function getName(): string
    {
        return $this->name;
    }
    public function getFirstName(): string
    {
        return $this->firstName;
    }
    public function getRegion(): string
    {
        return $this->region ?? '';
    }
    public function getCity(): string
    {
        return $this->city ?? '';
    }
    public function getJob(): ?string
    {
        return $this->job;
    }
    public function getBirth(): DateTimeImmutable
    {
        return $this->birth ?? new DateTimeImmutable();
    }
    public function getCellphone(): ?string
    {
        return $this->cellphone;
    }   
    public function getSkills(): array
    {
        return $this->skills;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function toArray(): array
    {
        return [
            'name' => $this->getName(),
            'firstName' => $this->getFirstName(),
            'region' => $this->getRegion(),
            'city' => $this->getCity(),
            'job' => $this->getJob(),
            'birth' => $this->getBirth()->format( 'Y-m-d'),
            'cellphone' => $this->getCellphone(),
            'skills' => $this->getSkills(),
            'email' => $this->getEmail()
        ];
    }
}