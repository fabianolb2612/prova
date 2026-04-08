<?php

require __DIR__ . "/../../source/autoload.php";

use source\Models\Banking\BankAccount;
use source\Models\Banking\SavingsAccount;

$accounts = [
    new BankAccount(1, "Fabiano", "0001-2", "1234"),
    new BankAccount(2, "Otávio", "0002-3", "4321")
];

$accounts[0]->deposit(1000);
$accounts[0]->withdraw(200, "1234");
$accounts[1]->deposit(1000);
$accounts[1]->withdraw(400, "4321");
$accounts[0]->withdraw(100, "9999");

$savings = new SavingsAccount(3, "Carlos", "0003-5", "1111", 0.5);
$savings->deposit(2000);
$savings->applyYield();

echo $accounts[0]->show() . "<br>";
echo $accounts[1]->show() . "<br>";
echo $savings->show() . "<br>";

echo "Transações:" . "<br>";
foreach ($accounts[0]->getTransactions() as $t) {
    echo $t->show() . "<br>";
}
