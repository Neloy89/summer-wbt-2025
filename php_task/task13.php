<?php

for ($i = 5; $i >= 1; $i--) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "<br>";
}
echo "<br>";

for ($i = 1; $i <= 4; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "$j ";
    }
    echo "<br>";
}
echo "<br>";

for ($i = 1; $i <= 4; $i++) {
    $char = chr(64 + $i); 
    for ($j = 1; $j <= $i; $j++) {
        echo "$char ";
    }
    echo "<br>";
}
?>