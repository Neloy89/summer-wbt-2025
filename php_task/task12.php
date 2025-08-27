<?php
for ($num = 2; $num <= 50; $num++) {
    $count = 0;
    for ($i = 1; $i <= $num; $i++) {
        if ($num % $i == 0) {
            $count++;
        }
    }
    if ($count == 2) {
        echo "$num<br>";
    }
}
?>