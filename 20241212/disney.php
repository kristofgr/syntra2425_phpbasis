<?php
require('functions.inc.php');

$items = makeRequest('https://api.disneyapi.dev/character?pageSize=20&page=1');

// print '<pre>';
// print_r($items);
// print '</pre>';
// exit;

print '<table>
    <thead>    
        <td>ID</td>
        <td>image</td>
        <td>name</td>
        <td>movies</td>
    </thead>';

foreach ($items->data as $item) {

    print '<tr>';
    print '<td>' . $item->_id . '</td>';

    if (isset($item->imageUrl)) {
        print '<td><img src="' . $item->imageUrl . '" width="100" /></td>';
    } else {
        print '<td>(image not set)</td>';
    }

    print '<td>' . $item->name . '</td>';
    print '<td>' . implode(', ', $item->films) . '</td>';

    print '</tr>';
}

print '</table>';
