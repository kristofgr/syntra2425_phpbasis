<?php
$height = @$_GET['h'];

for ($i = 1; $i <= $height; $i++) {
    // for ($x = 1; $x <= $i; $x++) {
    //     echo "*";
    // }
    $char = "*";
    if ($i % 5 == 0) {
        $char = "=";
    }


    echo str_repeat($char, $i) . "<br >";
}
