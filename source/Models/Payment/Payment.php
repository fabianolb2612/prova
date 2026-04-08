<?php
namespace source\Models\Payment;

class Payment
{
    private int $id;
    private float $amount;
    private string $status;
    private string $description;
    private string $createdAt;

    public function __construct(int $id, float $amount, string $description)
    {
        $this->id = $id;
        $this->amount = $amount;
        $this->description = $description;
        $this->status = "pendente";
        $this->createdAt = date('Y-m-d H:i:s');
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function calculateFee(): float
    {
        return 0.0;
    }

    public function process(): string
    {
        $this->status = "aprovado";
        return "Pagamento #{$this->id} processado com sucesso.";
    }

    public function show(): string
    {
        $fee = $this->calculateFee();
        $total = $this->amount + $fee;

        return "Pagamento: #{$this->id}<br>" .
               "Descrição: {$this->description}<br>" .
               "Valor: R$ " . number_format($this->amount, 2, ',', '.') . "<br>" .
               "Taxa: R$ " . number_format($fee, 2, ',', '.') . "<br>" .
               "Valor Total: R$ " . number_format($total, 2, ',', '.') . "<br>" .
               "Status: {$this->status}<br>";
    }
}