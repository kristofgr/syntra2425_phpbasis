<?php
$height = @$_GET['height'];

for ($i = 1; $i <= $height; $i++) {
    for ($s = 1; $s <= $i; $s++) {
        if ($i % 5 == 0) {
            print "=";
        } else {
            print "*";
        }
    }
    print '<br/>';
}
