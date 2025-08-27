<?php
$numbers = [12, 45, 23, 66, 34, 89];
$search = 66;
$found = false;

for ($i = 0; $i < count($numbers); $i++) {
    if ($numbers[$i] == $search) {
        $found = true;
        break;
    }
}

if ($found) {
    echo "$search is found in the array.";
} else {
    echo "$search is not found in the array.";
}
?>