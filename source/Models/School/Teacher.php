<?php
namespace source\Models\School;

class Teacher
{
    private int $id;
    private string $name;
    private string $email;
    private string $specialization;

    public function __construct(int $id, string $name, string $email, string $specialization)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->specialization = $specialization;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getSpecialization(): string
    {
        return $this->specialization;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setSpecialization(string $specialization): void
    {
        $this->specialization = $specialization;
    }

    public function show(): string
    {
        return "Professor (Teacher): #{$this->id} - Nome: {$this->name}<br>" .
               "E-mail: {$this->email}<br>" .
               "Especialização: {$this->specialization}<br>";
    }
}