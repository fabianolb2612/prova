<?php

require __DIR__ . "/../../source/autoload.php";

use source\Models\Payment\CreditCardPayment;
use source\Models\Payment\PixPayment;
use source\Models\Payment\BoletoPayment;

$cc1 = new CreditCardPayment(1, 250, "Compra Online", "4321", 3, 2.5);
$cc2 = new CreditCardPayment(2, 500, "Notebook", "1234", 5, 3.0);

$pix1 = new PixPayment(3, 150, "Pagamento Pix", "fabiano@gmail.com", "email");
$pix2 = new PixPayment(4, 80, "Transferência", "51998934138", "telefone");

$boleto = new BoletoPayment(5, 200, "Curso Online", "123456789", "2025-06-08", 3.50);

$payments = [$cc1, $cc2, $pix1, $pix2, $boleto];

foreach ($payments as $payment)
{
    echo $payment->process() . "<br>";
    echo $payment->show() . "<br>";
    echo "Taxa: R$ " . number_format($payment->calculateFee(), 2, ',', '.') . "<br>";
}
