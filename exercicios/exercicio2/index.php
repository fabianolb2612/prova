<?php

require __DIR__ . "/../../source/autoload.php";

use source\Models\Zoo\Mammal;
use source\Models\Zoo\Bird;
use source\Models\Zoo\Reptile;


$lion = new Mammal(1, "Simba", "Panthera leo", "Savana", 190, 5, "Dourado", 110);
$dolphin = new Mammal(2, "Flipper", "Delphinus", "Oceano", 150, 8, "Cinza", 365);

// Aves
$macaw = new Bird(3, "Blu", "Arara Azul", "Floresta", 0.3, 3, 40, true);
$penguin = new Bird(4, "Pingu", "Pinguim", "Antártica", 12, 6, 60, false);

// Réptil
$snake = new Reptile(5, "Rex", "Boa constrictor", "Amazônia", 12, 8, false, "Lisas");

// Métodos
echo $lion->eat() . "<br>";
echo $macaw->fly() . "<br>";
echo $penguin->fly() . "<br>";
echo $snake->shed() . "<br><br>";

// Show
echo $lion->show() . "<br>";
echo $dolphin->show() . "<br>";
echo $macaw->show() . "<br>";
echo $penguin->show() . "<br>";
echo $snake->show() . "<br>";