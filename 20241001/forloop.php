<?php
$x = @$_GET['count'];
$start = @$_GET['start'];

// print $x;

// Toon alle getallen, hou rekening met de waarde van ?count= in de URL
// for ($i = 0; $i <= $x; $i = $i + 1) {
//     print $i . '<br/>';
// }


// // Toon alle EVEN getallen, hou rekening met de waarde van count=  en start= in de URL
// for ($i = $start; $i <= ($start + $x); $i = $i + 1) {
//     // print "$i gedeeld door 2 is " . ($i / 2) . ", de restwaarde is " . ($i % 2) . "<br >";
//     if ($i % 2 == 0) {
//         print $i . '<br/>';
//     }
// }

// Toon alle PRIEMGETALLEM getallen, hou rekening met de waarde van count=  en start= in de URL
// $start = 3; //TODO
for ($i = $start; $i <= ($start + $x); $i = $i + 1) {
    $isPrime = true;

    for ($divider = 2; $divider < $i; $divider += 1) {
        if ($i % $divider == 0) {
            $isPrime = false;
        }
    }

    if ($isPrime) {
        print "$i is een priemgetal...<br />";
    }
}
