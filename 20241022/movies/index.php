<?php

$db_host = '127.0.0.1';
$db_user = 'root';
$db_password = 'root';
$db_db = 'phpbasis';
$db_port = 8889;

try {
    $db = new PDO('mysql:host=' . $db_host . '; port=' . $db_port . '; dbname=' . $db_db, $db_user, $db_password);
} catch (PDOException $e) {
    echo "Error!: " . $e->getMessage() . "<br />";
    die();
}
$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);


$sort = 'title';
$direction = 'ASC';

if (in_array(@$_GET['sort'], ['id', 'title', 'release_year', 'production_studio'])) {
    $sort = $_GET['sort'];
}

if (in_array(@$_GET['dir'], ['down'])) {
    $direction = 'DESC';
}

$sql = "SELECT * FROM movies ORDER BY $sort $direction";

$stmt = $db->prepare($sql);
$stmt->execute();
$movies = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<!DOCTYPE html>
<html lang="en" data-lt-installed="true">

<head>
    <link rel="icon" href="https://via.placeholder.com/70x70">
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">

    <meta charset="utf-8">
    <meta name="description" content="master detail over films">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        table thead tr th a {
            color: white;
        }
    </style>

    <title>Movies</title>
</head>

<body>
    <main>
        <section>
            <header>
                <h1>Movies</h1>
            </header>

            <table>
                <thead>
                    <tr>
                        <th><a href="?sort=id&dir=<?= ($sort == 'id' && $direction == 'ASC' ? 'down' : 'up'); ?>">ID</a></th>
                        <th><a href="?sort=title&dir=<?= ($sort == 'title' && $direction == 'ASC' ? 'down' : 'up'); ?>">Titel</a></th>
                        <th><a href="?sort=release_year&dir=<?= ($sort == 'release_year' && $direction == 'ASC' ? 'down' : 'up'); ?>">Jaar</a></th>
                        <th><a href="?sort=production_studio&dir=<?= ($sort == 'production_studio' && $direction == 'ASC' ? 'down' : 'up'); ?>">Studio</a></th>
                        <th>Genres</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($movies as $movie): ?>
                        <tr>
                            <td><b><?= $movie['id']; ?></b></td>
                            <td><?= $movie['title']; ?></td>
                            <td><?= $movie['release_year']; ?></td>
                            <td><?= $movie['production_studio']; ?></td>
                            <td><?= $movie['genres']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>


        </section>
    </main>

</body>

</html>