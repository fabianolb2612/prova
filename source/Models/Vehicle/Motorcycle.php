<?php
namespace source\Models\Vehicle;

class Motorcycle extends Vehicle
{
    private int $engineCC;
    private bool $hasSidecar;

    public function __construct(int $id, string $brand, string $model, int $year, string $fuelType, float $mileage, string $color, int $engineCC, bool $hasSidecar)
    {
        parent::__construct($id, $brand, $model, $year, $fuelType, $mileage, $color);

        $this->engineCC = $engineCC;
        $this->hasSidecar = $hasSidecar;
    }

    public function wheelie(): string
    {
        if ($this->engineCC >= 600)
        {
            return "{$this->getBrand()} {$this->getModel()} está fazendo um wheeling!";
        }

        return "{$this->getBrand()} {$this->getModel()} não tem potência para wheeling.";
    }

    public function show(): string
    {
        return "Motocicleta: #{$this->getId()} - {$this->getBrand()} {$this->getModel()}<br>" .
               parent::show() .
               "Cilindrada: {$this->engineCC} CC<br>" .
               "Sidecar: " . ($this->hasSidecar ? "Sim" : "Não") . "<br>";
    }
}