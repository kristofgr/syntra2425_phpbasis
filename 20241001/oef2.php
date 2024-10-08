<?php
$name = @$_GET['name'];
$gender = @$_GET['gender'];

$title = "";

if ($gender == "m") {
    $title = "Mr. ";
} elseif ($gender == "f") {
    $title = "Mv. ";
}

$name = ucwords($name);

print "Hallo " . $title . " " . $name;
