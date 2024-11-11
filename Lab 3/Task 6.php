<?php

$array = [5, 12, 17, 24, 33, 41, 56, 78, 99];
$searchElement = 333;
$isFound = false;

for ($i = 0; $i < count($array); $i++) {
    
    if ($array[$i] == $searchElement) {
        
        $isFound = true;
        break;
    }
}

if ($isFound) {
    echo "Element $searchElement is found in the array.";
} else {
    echo "Element $searchElement is not found in the array.";
}
?>

