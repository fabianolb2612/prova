<?php
namespace source\Models\School;

class Enrollment
{
    private int $id;
    private Student $student;
    private Course $course;
    private string $enrollmentDate;
    private ?float $grade;
    private string $status;

    public function __construct(int $id, Student $student, Course $course, string $enrollmentDate)
    {
        $this->id = $id;
        $this->student = $student;
        $this->course = $course;
        $this->enrollmentDate = $enrollmentDate;
        $this->grade = null;
        $this->status = "ativa";
    }

    public function setGrade(?float $grade): void
    {
        $this->grade = $grade;
    }

    public function approve(): bool
    {
        if ($this->grade === null)
        {
            return false;
        }

        if ($this->grade >= 6.0)
        {
            $this->status = "concluida";
            return true;
        }

        return false;
    }

    public function show(): string
    {
        return "Matrícula (Enrollment): #{$this->id}<br>" .
               "Aluno: {$this->student->getName()}<br>" .
               "Disciplina: {$this->course->getName()}<br>" .
               "Professor: {$this->course->getTeacher()->getName()}<br>" .
               "Data: {$this->enrollmentDate}<br>" .
               "Nota: " . ($this->grade !== null ? number_format($this->grade, 1, ',', '.') : "N/A") . "<br>" .
               "Status: {$this->status}<br>";
    }
}