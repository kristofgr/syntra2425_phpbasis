<?php
require('db.inc.php');

$items = getNewsItems();
// $authors = getAuthors();

// print '<pre>';
// print_r($items);
// // print_r($authors);
// print '</pre>';
?>
<!doctype html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My first CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">
</head>

<body>


    <div class="container">
        <main class="col-md-9">
            <h2>Admin news items</h2>

            <?php if (isset($_GET["message"])): // zit er een message in mijn GET array? 
            ?>
                <div class="p-3 text-success-emphasis bg-success-subtle border border-success-subtle rounded-3">
                    <?= $_GET["message"]; ?>
                </div>
            <?php endif; ?>

            <a href="form.php">
                <button type="button" class="btn btn-outline-primary"><i class="bi bi-plus-circle"></i> Add new item</button></a>

            <div class="table-responsive small">
                <table class="table table-hover table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Author</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($items as $item): ?>

                            <tr>
                                <td><?= $item['id']; ?></td>
                                <td><?= $item['title']; ?></td>
                                <td><?= $item['author_name']; ?></td>
                                <td>published</td>
                                <td>
                                    <a href="index.php">
                                        <button type="button" class="btn btn-outline-primary">View</button></a>
                                    <a href="edit.php?id=<?= $item['id']; ?>">
                                        <button type="button" class="btn btn-outline-warning">Edit</button></a>
                                    <a href="index.php">
                                        <button type="button" class="btn btn-outline-danger">Delete</button></a>
                                </td>
                            </tr>

                        <?php endforeach; ?>


                    </tbody>
                </table>
            </div>
        </main>

    </div>

    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>