<?php
require('wikis.php');

$wikis = array_reverse($wikis);
?>
<!DOCTYPE html>
<html lang="en" data-lt-installed="true">

<head>
    <link rel="icon" href="https://via.placeholder.com/70x70">
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">

    <meta charset="utf-8">
    <meta name="description" content="WikiWisKwis">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>WikiWisKwis - Overzicht</title>
</head>

<body>
    <main>
        <section>
            <header>
                <h1>WikiWisKwis</h1>
            </header>

            <table>
                <thead>
                    <tr>
                        <th>Datum</th>
                        <th>Titel</th>
                        <th>Tip</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($wikis as $wiki): ?>
                        <tr>
                            <td><b><?= $wiki['episode']; ?></b></td>
                            <td><?= $wiki['title']; ?></td>
                            <td><?= $wiki['tip']; ?></td>
                            <td><a href="detail.php">Speel nu</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </section>
    </main>

</body>

</html>