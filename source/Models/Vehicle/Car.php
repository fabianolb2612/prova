<?php
namespace source\Models\Vehicle;

class Car extends Vehicle
{
    private int $doors;
    private int $passengers;
    private float $trunkCapacity;

    public function __construct(int $id, string $brand, string $model, int $year, string $fuelType, float $mileage, string $color, int $doors, int $passengers, float $trunkCapacity)
    {
        parent::__construct($id, $brand, $model, $year, $fuelType, $mileage, $color);

        $this->doors = $doors;
        $this->passengers = $passengers;
        $this->trunkCapacity = $trunkCapacity;
    }

    public function openTrunk(): string
    {
        return "O porta-malas do {$this->getBrand()} {$this->getModel()} foi aberto. Capacidade: " .
               number_format($this->trunkCapacity, 2, ',', '.') . " litros.";
    }

    public function show(): string
    {
        return "Carro (Car): #{$this->getId()} - {$this->getBrand()} {$this->getModel()}<br>" .
               parent::show() .
               "Portas: {$this->doors}<br>" .
               "Passageiros: {$this->passengers}<br>" .
               "Porta-malas: " . number_format($this->trunkCapacity, 2, ',', '.') . " litros<br>";
    }
}