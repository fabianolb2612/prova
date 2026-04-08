<?php
namespace source\Models\Library;

class Author
{
    private int $id;
    private string $name;
    private string $nationality;
    private string $birthDate;
    private string $biography;

    public function __construct(int $id, string $name, string $nationality, string $birthDate, string $biography)
    {
        $this->id = $id;
        $this->name = $name;
        $this->nationality = $nationality;
        $this->birthDate = $birthDate;
        $this->biography = $biography;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function show(): string
    {
        return "Autor: #{$this->id} - {$this->name}<br>" .
               "Nacionalidade: {$this->nationality}<br>" .
               "Nascimento: {$this->birthDate}<br>" .
               "Biografia: {$this->biography}<br>";
    }
}