<?php
namespace source\Models\Payment;

class PixPayment extends Payment
{
    private string $pixKey;
    private string $pixKeyType;

    public function __construct(int $id, float $amount, string $description, string $pixKey, string $pixKeyType)
    {
        parent::__construct($id, $amount, $description);
        $this->pixKey = $pixKey;
        $this->pixKeyType = $pixKeyType;
    }

    public function calculateFee(): float
    {
        return 0.0;
    }

    public function process(): string
    {
        $this->setStatus("aprovado");

        return "⚡ Pix aprovado instantaneamente! Chave: {$this->pixKey}";
    }

    public function show(): string
    {
        return "Pix<br>" .
               "Valor: R$ " . number_format($this->getAmount(), 2, ',', '.') . "<br>" .
               "Chave: {$this->pixKey} ({$this->pixKeyType})<br>" .
               "Taxa: R$ 0,00<br>" .
               "Status: {$this->getStatus()}<br>";
    }
}