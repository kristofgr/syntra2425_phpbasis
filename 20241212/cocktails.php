<?php
require('functions.inc.php');

$cocktails = makeRequest('https://www.thecocktaildb.com/api/json/v1/1/search.php?s=gin');

// print '<pre>';
// print_r($cocktails);
// print '</pre>';

print '<table>';

foreach ($cocktails->drinks as $drink) {

    $ingredients = [
        $drink->strIngredient1,
        $drink->strIngredient2,
        $drink->strIngredient3,
        $drink->strIngredient4,
        $drink->strIngredient5,
        $drink->strIngredient6,
        $drink->strIngredient7,
        $drink->strIngredient8,
        $drink->strIngredient9,
        $drink->strIngredient10,
        $drink->strIngredient11,
        $drink->strIngredient12,
        $drink->strIngredient13,
        $drink->strIngredient14,
        $drink->strIngredient15
    ];

    print '<tr>';
    print '<td>' . $drink->idDrink . '</td>';
    print '<td>' . $drink->strDrink . '</td>';
    print '<td>' . $drink->strCategory . '</td>';
    print '<td>' . $drink->strAlcoholic . '</td>';
    print '<td>' . implode(', ', $ingredients) . '</td>';
    print '</tr>';
}

print '</table>';
