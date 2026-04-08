<?php
namespace source\Models\Vehicle;

class Truck extends Vehicle
{
    private float $payload;
    private int $axles;
    private bool $hasRefrigeration;

    public function __construct(int $id, string $brand, string $model, int $year, string $fuelType, float $mileage, string $color, float $payload, int $axles, bool $hasRefrigeration)
    {
        parent::__construct($id, $brand, $model, $year, $fuelType, $mileage, $color);

        $this->payload = $payload;
        $this->axles = $axles;
        $this->hasRefrigeration = $hasRefrigeration;
    }

    public function loadCargo(float $tons): string
    {
        if ($tons <= $this->payload)
        {
            return "{$this->getBrand()} {$this->getModel()} carregado com " .
                   number_format($tons, 2, ',', '.') . " toneladas com sucesso!";
        }

        return "Carga de " . number_format($tons, 2, ',', '.') .
               " excede a capacidade do {$this->getBrand()} {$this->getModel()} (" .
               number_format($this->payload, 2, ',', '.') . " ton).";
    }

    public function show(): string
    {
        return "Caminhão: #{$this->getId()} - {$this->getBrand()} {$this->getModel()}<br>" .
               parent::show() .
               "Capacidade: " . number_format($this->payload, 2, ',', '.') . " toneladas<br>" .
               "Eixos: {$this->axles}<br>" .
               "Refrigerado: " . ($this->hasRefrigeration ? "Sim" : "Não") . "<br>";
    }
}