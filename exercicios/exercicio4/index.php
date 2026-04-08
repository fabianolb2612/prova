<?php

require __DIR__ . "/../../source/autoload.php";

use source\Models\School\Teacher;
use source\Models\School\Student;
use source\Models\School\Course;
use source\Models\School\Enrollment;


$t1 = new Teacher(1, "Carlos Silva", "carlos@escola.com", "Programação");
$t2 = new Teacher(2, "Ana Lima", "ana@escola.com", "Matemática");

$s1 = new Student(1, "João", "joao@email.com", "2025001");
$s2 = new Student(2, "Maria", "maria@email.com", "2025002");
$s3 = new Student(3, "Pedro", "pedro@email.com", "2025003");

$c1 = new Course(1, "Programação Web II", "INF-3AT-26", 80, $t1);
$c2 = new Course(2, "Matemática", "MAT-2026", 60, $t2);

$e1 = new Enrollment(1, $s1, $c1, "2025-02-01");
$e1->setGrade(8.5);

$e2 = new Enrollment(2, $s2, $c1, "2025-02-01");
$e2->setGrade(5.0);

$e3 = new Enrollment(3, $s3, $c2, "2025-02-01");

$e4 = new Enrollment(4, $s1, $c2, "2025-02-01");
$e4->setGrade(7.0);

$enrollments = [$e1, $e2, $e3, $e4];

foreach ($enrollments as $e)
{
    echo ($e->approve() ? "Aprovado<br>" : "Não aprovado<br>");
}


echo "Antes:<br>";
echo $c1->show();

$c1->setTeacher($t2);

echo "<br>Depois:<br>";
echo $c1->show();


foreach ($enrollments as $e)
{
    echo $e->show() . "<br>";
}