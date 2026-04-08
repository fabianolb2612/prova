<?php
namespace source\Models\Hospital;

class Patient
{
    private int $id;
    private string $name;
    private string $cpf;
    private string $dateOfBirth;
    private string $bloodType;
    private array $allergies;

    public function __construct(int $id, string $name, string $cpf, string $dateOfBirth, string $bloodType)
    {
        $this->id = $id;
        $this->name = $name;
        $this->cpf = preg_replace('/\D/', '', $cpf);
        $this->dateOfBirth = $dateOfBirth;
        $this->bloodType = $bloodType;
        $this->allergies = [];
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function getCpfMasked(): string
    {
        return "***.***." . substr($this->cpf, 6, 3) . "-" . substr($this->cpf, 9, 2);
    }

    public function addAllergy(string $allergy): void
    {
        if (!in_array($allergy, $this->allergies))
        {
            $this->allergies[] = $allergy;
        }
    }

    public function hasAllergy(string $allergy): bool
    {
        return in_array($allergy, $this->allergies);
    }

    public function show(): string
    {
        $allergies = empty($this->allergies)
            ? "Nenhuma registrada"
            : implode(", ", $this->allergies);

        return "Paciente (Patient): #{$this->id} - {$this->name}<br>" .
               "CPF: {$this->getCpfMasked()}<br>" .
               "Data de Nascimento: {$this->dateOfBirth}<br>" .
               "Tipo Sanguíneo: {$this->bloodType}<br>" .
               "Alergias: {$allergies}<br>";
    }
}