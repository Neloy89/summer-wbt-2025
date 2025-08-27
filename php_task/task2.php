<?php
$amount = 100;
$vat_rate = 0.15;

$vat = $amount * $vat_rate;
$total = $amount + $vat;

echo "Amount: $amount <br>";
echo "VAT (15%): $vat <br>";
echo "Total (Amount + VAT): $total <br>";
?>