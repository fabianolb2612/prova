<?php
namespace source\Models\Vehicle;

class Vehicle
{
    private int $id;
    private string $brand;
    private string $model;
    private int $year;
    private string $fuelType;
    private float $mileage;
    private string $color;

    public function __construct(int $id, string $brand, string $model, int $year, string $fuelType, float $mileage, string $color)
    {
        $this->id = $id;
        $this->brand = $brand;
        $this->model = $model;
        $this->year = $year;
        $this->fuelType = $fuelType;
        $this->mileage = $mileage;
        $this->color = $color;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getYear(): int
    {
        return $this->year;
    }

    public function getFuelType(): string
    {
        return $this->fuelType;
    }

    public function getMileage(): float
    {
        return $this->mileage;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function setMileage(float $mileage): void
    {
        $this->mileage = $mileage;
    }

    public function refuel(): string
    {
        return "{$this->brand} {$this->model} está sendo abastecido com {$this->fuelType}.";
    }

    public function drive(float $km): string
    {
        $this->mileage += $km;

        return "{$this->brand} {$this->model} percorreu " .
            number_format($km, 2, ',', '.') .
            " km. Quilometragem atual: " .
            number_format($this->mileage, 2, ',', '.') . " km.";
    }

    public function show(): string
    {
        return "Veículo (Vehicle): #{$this->id} - {$this->brand} {$this->model}<br>" .
               "Ano: {$this->year}<br>" .
               "Cor: {$this->color}<br>" .
               "Combustível: {$this->fuelType}<br>" .
               "Quilometragem: " . number_format($this->mileage, 2, ',', '.') . " km<br>";
    }
}