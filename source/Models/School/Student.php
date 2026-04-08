<?php
namespace source\Models\School;

class Student
{
    private int $id;
    private string $name;
    private string $email;
    private string $registrationNumber;

    public function __construct(int $id, string $name, string $email, string $registrationNumber)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->registrationNumber = $registrationNumber;
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

    public function getRegistrationNumber(): string
    {
        return $this->registrationNumber;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function setRegistrationNumber(string $registrationNumber): void
    {
        $this->registrationNumber = $registrationNumber;
    }

    public function show(): string
    {
        return "Aluno (Student): #{$this->id} - Nome: {$this->name}<br>" .
               "E-mail: {$this->email}<br>" .
               "Matrícula: {$this->registrationNumber}<br>";
    }
}