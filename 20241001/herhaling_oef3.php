<?php

$title = "";
$name = @$_GET['name'];
$name = strtolower($name);
$name = ucwords($name);

$gender = @$_GET['gender'];

if ($gender == "f") {
    $title = "Mv. ";
} else if ($gender == "m") {
    $title = "Mr. ";
}

echo "Beste " . $title . $name;
