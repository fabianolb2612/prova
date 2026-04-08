<?php
namespace source\Models\Zoo;

class Bird extends Animal
{
    private float $wingspan;
    private bool $canFly;

    public function __construct(int $id, string $name, string $species, string $habitat, float $weight, int $age, float $wingspan, bool $canFly)
    {
        parent::__construct($id, $name, $species, $habitat, $weight, $age);
        $this->wingspan = $wingspan;
        $this->canFly = $canFly;
    }

    public function sing(): string
    {
        return "{$this->getName()} está cantando.";
    }

    public function fly(): string
    {
        return $this->canFly
            ? "{$this->getName()} está voando!"
            : "{$this->getName()} não consegue voar.";
    }

    public function show(): string
    {
        return "Ave (Bird): #{$this->getId()} - {$this->getName()}<br>" .
               "Espécie (Species): {$this->getSpecies()}<br>" .
               "Habitat: {$this->getHabitat()}<br>" .
               "Peso (Weight): " . number_format($this->getWeight(), 2, ',', '.') . " kg<br>" .
               "Idade (Age): {$this->getAge()} anos<br>" .
               "Envergadura: " . number_format($this->wingspan, 2, ',', '.') . " cm<br>" .
               "Voa: " . ($this->canFly ? "Sim" : "Não") . "<br>";
    }
}