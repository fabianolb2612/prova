<?php
namespace source\Models\Payment;

class CreditCardPayment extends Payment
{
    private string $cardLastDigits;
    private int $installments;
    private float $feeRate;

    public function __construct(int $id, float $amount, string $description, string $cardLastDigits, int $installments, float $feeRate)
    {
        parent::__construct($id, $amount, $description);
        $this->cardLastDigits = $cardLastDigits;
        $this->installments = max(1, $installments);
        $this->feeRate = $feeRate;
    }

    public function calculateFee(): float
    {
        return $this->getAmount() * ($this->feeRate / 100);
    }

    public function process(): string
    {
        $this->setStatus("aprovado");

        $total = $this->getAmount() + $this->calculateFee();
        $installmentValue = $total / $this->installments;

        return "✅ Cartão **** {$this->cardLastDigits} aprovado | {$this->installments}x de R$ " .
               number_format($installmentValue, 2, ',', '.');
    }

    public function show(): string
    {
        $fee = $this->calculateFee();
        $total = $this->getAmount() + $fee;

        return "Cartão de Crédito<br>" .
               "Valor: R$ " . number_format($this->getAmount(), 2, ',', '.') . "<br>" .
               "Taxa ({$this->feeRate}%): R$ " . number_format($fee, 2, ',', '.') . "<br>" .
               "Parcelas: {$this->installments}<br>" .
               "Total: R$ " . number_format($total, 2, ',', '.') . "<br>" .
               "Status: {$this->getStatus()}<br>";
    }
}