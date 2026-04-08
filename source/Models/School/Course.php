<?php
namespace source\Models\School;

class Course
{
    private int $id;
    private string $name;
    private string $code;
    private int $workload;
    private Teacher $teacher;

    public function __construct(int $id, string $name, string $code, int $workload, Teacher $teacher)
    {
        $this->id = $id;
        $this->name = $name;
        $this->code = $code;
        $this->workload = $workload;
        $this->teacher = $teacher;
    }

    public function getTeacher(): Teacher
    {
        return $this->teacher;
    }

    public function setTeacher(Teacher $teacher): void
    {
        $this->teacher = $teacher;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function show(): string
    {
        return "Disciplina (Course): #{$this->id} - {$this->name}<br>" .
               "Código: {$this->code}<br>" .
               "Carga Horária: {$this->workload} horas<br>" .
               "Professor: {$this->teacher->getName()}<br>";
    }
}