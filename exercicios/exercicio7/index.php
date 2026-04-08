<?php

require __DIR__ . "/../../source/autoload.php";

use source\Models\Vehicle\Car;
use source\Models\Vehicle\Motorcycle;
use source\Models\Vehicle\Truck;

$cars =
[
    new Car(1, "Toyota", "Corolla", 2023, "gasolina", 10000, "Prata", 4, 5, 370),
    new Car(2, "Honda", "Civic", 2022, "flex", 20000, "Preto", 4, 5, 400)
];

$motos = [
    new Motorcycle(3, "Honda", "CB 600", 2022, "gasolina", 8000, "Vermelha", 600, false),
    new Motorcycle(4, "Honda", "Biz 125", 2021, "gasolina", 5000, "Branca", 125, false)
];


$truck = new Truck(5, "Volvo", "FH 460", 2021, "diesel", 120000, "Branco", 15, 6, true);

// Testes
echo $cars[0]->drive(150) . "<br>";
echo $motos[0]->wheelie() . "<br>";
echo $truck->loadCargo(20) . "<br><br>";

echo $cars[0]->show() . "<br>";
echo $cars[1]->show() . "<br>";
echo $motos[0]->show() . "<br>";
echo $motos[1]->show() . "<br>";
echo $truck->show() . "<br>";