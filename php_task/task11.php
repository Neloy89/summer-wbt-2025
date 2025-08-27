<?php
$number = 8;
$factorial = 1;

for ($i = 1; $i <= $number; $i++) {
    $factorial *= $i;
}
echo "Factorial of $number is $factorial";
?>