<?php
namespace source\Models\Hospital;

class MedicalRecord
{
    private int $id;
    private Patient $patient;
    private Doctor $doctor;
    private string $diagnosis;
    private string $prescription;
    private string $createdAt;

    public function __construct(int $id, Patient $patient, Doctor $doctor, string $diagnosis, string $prescription)
    {
        $this->id = $id;
        $this->patient = $patient;
        $this->doctor = $doctor;
        $this->diagnosis = $diagnosis;
        $this->prescription = $prescription;
        $this->createdAt = date('Y-m-d H:i:s');
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getPatient(): Patient
    {
        return $this->patient;
    }

    public function getDoctor(): Doctor
    {
        return $this->doctor;
    }

    public function getDiagnosis(): string
    {
        return $this->diagnosis;
    }

    public function getPrescription(): string
    {
        return $this->prescription;
    }

    public function getCreatedAt(): string
    {
        return $this->createdAt;
    }

    public function show(): string
    {
        return "Prontuário (Medical Record): #{$this->id}<br>" .
               "Data: {$this->createdAt}<br>" .
               "Paciente: {$this->patient->getName()}<br>" .
               "Médico: Dr(a). {$this->doctor->getName()} | {$this->doctor->getCrm()}<br>" .
               "Diagnóstico: {$this->diagnosis}<br>" .
               "Prescrição: {$this->prescription}<br>";
    }
}