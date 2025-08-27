<?php
$a = 12;
$b = 25;
$c = 7;

if ($a >= $b && $a >= $c) {
    echo "$a is the largest number";
} elseif ($b >= $a && $b >= $c) {
    echo "$b is the largest number";
} else {
    echo "$c is the largest number";
}
?> 