<?php

$getal1 = @$_GET['start'];
$getal2 = $getal1 + @$_GET['count'];

// $som = 10 + 11 + 12;
$som = 0;

for ($i = $getal1; $i < $getal2; $i++) {
    echo "$i <br >";
    $som = $som + $i;
}


echo "De som bedraagt $som";
