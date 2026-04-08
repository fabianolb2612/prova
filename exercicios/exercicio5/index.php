<?php

require __DIR__ . "/../../source/autoload.php";

use source\Models\Export\CsvExporter;
use source\Models\Export\JsonExporter;
use source\Models\Export\XmlExporter;

$headers = ['id', 'nome', 'email'];

$rows = [
    [1, 'Ana Souza', 'ana@gmail.com'],
    [2, 'Bruno Lima', 'bruno@gmail.com'],
    [3, 'Carla Dias', 'carla@gmail.com'],
];

$csv = new CsvExporter("Relatório de Usuários", $headers, $rows);
$json = new JsonExporter("Relatório de Usuários", $headers, $rows);
$xml = new XmlExporter("Relatório de Usuários", $headers, $rows);

// Mostrar info
echo $csv->show() . "<br>";
echo $json->show() . "<br>";
echo $xml->show() . "<br>";

// Exportar
echo "<pre>";
echo $csv->export() . "<br><br>";
echo $json->export() . "<br><br>";
echo $xml->export();
echo "</pre>";