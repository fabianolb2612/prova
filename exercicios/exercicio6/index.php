<?php

require __DIR__ . "/../../source/autoload.php";

use source\Models\Hospital\Doctor;
use source\Models\Hospital\Patient;
use source\Models\Hospital\MedicalRecord;

$doctors = 
[
    new Doctor(1, "Carlos Mendes", "carlos@gmail.com", "CRM/SP 123456", "Cardiologia"),
    new Doctor(2, "Ana Paula", "ana@gmail.com", "CRM/SP 654321", "Pediatria")
];


$patients = 
[
    new Patient(1, "Fabiano Braga", "12345678901", "1990-05-14", "A+"),
    new Patient(2, "José Otávio", "98765432100", "1985-03-10", "O-"),
    new Patient(3, "Vinícius Oliveira", "11122233344", "2000-01-20", "B+")
];

$patients[0]->addAllergy("Penicilina");
$patients[0]->addAllergy("Dipirona");

echo $patients[0]->hasAllergy("Penicilina") ? "Tem alergia<br>" : "Não tem alergia<br>";

$records =
[
    new MedicalRecord(1, $patients[0], $doctors[0], "Hipertensão leve", "Losartana 50mg"),
    new MedicalRecord(2, $patients[1], $doctors[0], "Arritmia", "Exames adicionais"),
    new MedicalRecord(3, $patients[2], $doctors[1], "Gripe", "Repouso e hidratação"),
    new MedicalRecord(4, $patients[0], $doctors[1], "Alergia alimentar", "Antialérgico")
];



echo $doctors[0]->show() . "<br>";
echo $patients[0]->show() . "<br>";

echo $records[0]->show() . "<br>";
echo $records[1]->show() . "<br>";
echo $records[2]->show() . "<br>";
echo $records[3]->show() . "<br>";
