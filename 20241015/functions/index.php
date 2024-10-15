<?php

function subFib($start, $count = 2)
{
    $sum = 0;
    for ($i = $start; $i < ($start + $count); $i++) {
        $sum += $i;
    }
    return $sum;
}

print subFib(20) . "<br />";
print subFib(20, 3) . "<br />";
print subFib(50, 100) . "<br />";
// print $start;

$basis = 10000;

function superSom(int $one, int $two): int
{
    global $basis;

    return $basis + $one + $two;
}

print "De supersom van 5 en 10 is " . superSom(5, 10) . "<br>";

$basis = 100;

print "De supersom van 5 en 10 is " . superSom(5, 10) . "<br>";
