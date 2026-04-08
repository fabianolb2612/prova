<?php
namespace source\Models\Zoo;

class Reptile extends Animal
{
    private bool $isVenomous;
    private string $scaleType;

    public function __construct(int $id, string $name, string $species, string $habitat, float $weight, int $age, bool $isVenomous, string $scaleType)
    {
        parent::__construct($id, $name, $species, $habitat, $weight, $age);
        $this->isVenomous = $isVenomous;
        $this->scaleType = $scaleType;
    }

    public function shed(): string
    {
        return "{$this->getName()} está trocando de pele.";
    }

    public function show(): string
    {
        return "Réptil (Reptile): #{$this->getId()} - {$this->getName()}<br>" .
               "Espécie (Species): {$this->getSpecies()}<br>" .
               "Habitat: {$this->getHabitat()}<br>" .
               "Peso (Weight): " . number_format($this->getWeight(), 2, ',', '.') . " kg<br>" .
               "Idade (Age): {$this->getAge()} anos<br>" .
               "Venenoso: " . ($this->isVenomous ? "Sim" : "Não") . "<br>" .
               "Tipo de Escamas: {$this->scaleType}<br>";
    }
}