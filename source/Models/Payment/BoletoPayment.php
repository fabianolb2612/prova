<?php
namespace source\Models\Payment;

class BoletoPayment extends Payment
{
    private string $barCode;
    private string $dueDate;
    private float $issuanceFee;

    public function __construct(int $id, float $amount, string $description, string $barCode, string $dueDate, float $issuanceFee)
    {
        parent::__construct($id, $amount, $description);
        $this->barCode = $barCode;
        $this->dueDate = $dueDate;
        $this->issuanceFee = $issuanceFee;
    }

    public function calculateFee(): float
    {
        return $this->issuanceFee;
    }

    public function process(): string
    {
        $this->setStatus("pendente");

        $total = $this->getAmount() + $this->calculateFee();

        return "🧾 Boleto gerado! Vencimento: {$this->dueDate} | Valor Total: R$ " .
               number_format($total, 2, ',', '.');
    }

    public function show(): string
    {
        $total = $this->getAmount() + $this->calculateFee();

        return "Boleto<br>" .
               "Código: {$this->barCode}<br>" .
               "Vencimento: {$this->dueDate}<br>" .
               "Valor Total: R$ " . number_format($total, 2, ',', '.') . "<br>" .
               "Compensação: até 3 dias úteis<br>" .
               "Status: {$this->getStatus()}<br>";
    }
}