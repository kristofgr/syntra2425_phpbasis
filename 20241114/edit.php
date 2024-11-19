<?php
require('db.inc.php');

$id = (int)@$_REQUEST['id'];

// er werd geen geldige waarde als ?id meegegeven
if ($id == 0) {
    header("Location: index.php");
    exit;
}

// haal het record op uit de DB
$item = getNewsItemById($id);

// er werd een ongeldige integer ?id gebruikt waarvoor geen record in de DB aanwezig is
if ($item == false) {
    header("Location: index.php");
    exit;
}

$title = $item['title'];
$body = $item['body'];
$author_id = $item['author_id'];
$status = $item['status'];


// print "<pre>";
// print_r($item);
// print "</pre>";







$authors = getAuthors();

$errors = [];
$submitted = false;


// Kijken of het formulier ge-submit werd
if (@$_POST['submit']) { // is "submit" als key aanwezig in de $_POST array

    $submitted = true;

    print '<pre>';
    print_r($_POST);
    print '</pre>';

    // 1: alle default values declareren
    $title = "";
    $body = "";
    $author_id = null;
    $status = 0;

    // 2: validatie uitvoeren
    if (!isset($_POST['title'])) { // zit title in mijn POST?
        $errors[] = "title field missing...";
    } else {
        if (strlen($_POST['title']) == 0) { // is het title field ingevuld?
            $errors[] = "title field can not be empty";
        } else { // Er waren geen problemen met de waarde van title
            $title = $_POST['title'];
        }
    }

    if (!isset($_POST['body'])) { // zit body in mijn POST?
        $errors[] = "body field missing...";
    } else {
        $body = $_POST['body'];
    }

    if (!isset($_POST['author'])) { // zit author in mijn POST?
        $errors[] = "author field missing...";
    } else {
        if ((int)$_POST['author'] === 0) {
            $_POST['author'] = null;
        }

        if (!isset($authors[$_POST['author']]) && $_POST['author'] !== null) { // is author id niet geldig?
            $errors[] = "Author ID is not valid.";
        } else {
            $author_id = $_POST['author'];
        }
    }

    if (isset($_POST['status']) && (int)$_POST['status'] === 1) { // zit status in mijn POST én is deze gelijk aan 1 (niet aangevinkte checkboxes worden niet via post meegestuurd)?
        $status = 1;
    }

    // 3: indien validatie ok: UPDATE in db
    if (count($errors) == 0) { // er werden geen fouten geregistreerd tijdens validatie
        $return = updateNewsItem($id, $title, $body, $author_id, $status);
        header("Location: index.php?message=Record met id $id ($title) werd aangepast...");
    }
}



?>
<!doctype html>
<html lang="nl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My first CRUD - Update item</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">
</head>

<body>


    <div class="container">
        <main class="col-md-9">
            <h2>Update item</h2>

            <?php if (count($errors) > 0): ?>
                <div class="p-3 text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-3">
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li><?= $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif ?>

            <?php if ($submitted && count($errors) == 0): ?>
                <div class="p-3 text-success-emphasis bg-success-subtle border border-success-subtle rounded-3">
                    Nieuws item werd toegevoegd...
                </div>
            <?php endif; ?>


            <form method="post" action="edit.php">

                <input type="hidden" id="id" name="id" value="<?= $id; ?>" />

                <div class="mb-3">
                    <label for="title" class="form-label">Title *</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title..." value="<?= @$title; ?>" />
                </div>
                <div class="mb-3">
                    <label for="body" class="form-label">Article</label>
                    <textarea class="form-control" id="body" name="body" rows="5"><?= @$body; ?></textarea>
                </div>

                <div class="mb-3">
                    <select id="author" name="author" class="form-select" aria-label="Author">
                        <option <?= @$author_id == null ? 'selected' : ''; ?> value="0">Please select an author</option>
                        <?php foreach ($authors as $index => $author): ?>
                            <option value="<?= $index; ?>" <?= $index == @$author_id ? 'selected' : ''; ?>><?= $author; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="status" name="status" value="1" <?= $status == 0 ? '' : 'checked'; ?>>
                        <label class="form-check-label" for="status">Published</label>
                    </div>
                </div>

                <input type="submit" name="submit" id="submit" />
            </form>

        </main>

    </div>

    <script src="/docs/5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>