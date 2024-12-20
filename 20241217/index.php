<?php
require('db.inc.php');

$errors = [];
$inputUrl = '';

if (isset($_POST['formSubmit'])) {

    // validation for URL
    if (!isset($_POST['inputUrl'])) {
        $errors[] = "URL is required";
    } else {
        $inputUrl = $_POST['inputUrl'];

        // check if URL is no longer than 255 characters
        if (strlen($inputUrl) == 0) {
            $errors[] = "URL is required";
        }

        // check if URL is valid
        if (!preg_match("/(http|https|ftp|ftps)\:\/\/[a-zA-Z0-9\-\.]+\.[a-zA-Z]{2,3}(\/\S*)?/", $inputUrl)) {
            $errors[] = "URL is not valid";
        }
    }

    if (!count($errors)) {


        // haal og title, descrr,.... op via api
        $ogData = getOgViaApi($inputUrl);

        $ogtitle = @$ogData->hybridGraph->title ?? '';
        $ogdescription = @$ogData->hybridGraph->description ?? '';
        $ogimage = @$ogData->hybridGraph->image ?? '';;

        // insert into db
        $id = insertOgLink($inputUrl, $ogtitle, $ogdescription, $ogimage);

        if (!$id) {
            $errors[] = "Something unexplainable happened...";
        }
    }
}
$items = getOgLinks();

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Oglinks</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" integrity="sha384-tViUnnbYAV00FLIhhi3v/dWt3Jxw4gZQcNoSCxCIFNJVCx7/D55/wXsrNIRANwdD" crossorigin="anonymous">
    <style>
        img.thumb {
            height: 50px;
        }
    </style>
</head>

<body>


    <div class="container">
        <section>
            <h2>Add new link</h2>
            <hr />

            <?php if (count($errors)) : ?>
                <div class="alert alert-danger" role="alert">
                    <ul>
                        <?php foreach ($errors as $error) : ?>
                            <li><?= $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="post" action="index.php">

                <div class="form-group mt-3">
                    <label for="inputUrl" class="col-sm-2 col-form-label">URL: *</label>
                    <div>
                        <input type="text" class="form-control" id="inputUrl" name="inputUrl" placeholder="https://..." value="<?= $inputUrl; ?>">
                    </div>
                </div>

                <div class="form-group mt-5">
                    <div>
                        <button type="submit" class="btn btn-primary" name="formSubmit" style="width: 100%">Add</button>
                    </div>
                </div>
            </form>


        </section>
        <main>


            <h2>OG Links</h2>
            <div class="table-responsive small">
                <table class="table table-hover table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">#ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">URL</th>
                            <th scope="col">Weight</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($items as $item): ?>

                            <tr>
                                <td><?= $item['id']; ?></td>
                                <td><?= ($item['ogimage'] !== null && strlen($item['ogimage']) > 0) ? '<img src="' . $item['ogimage'] . '" class="thumb"/>' : 'no image'; ?></td>
                                <td><?= mb_strimwidth(($item['ogtitle'] ?? 'no title'), 0, 50, "..."); ?></td>
                                <td><?= mb_strimwidth(($item['ogdescription'] ?? 'no description'), 0, 50, "..."); ?></td>
                                <td><?= mb_strimwidth($item['url'], 0, 50, "..."); ?></td>
                                <td><?= $item['weight']; ?></td>

                            </tr>

                        <?php endforeach; ?>


                    </tbody>
                </table>

                <nav aria-label="Overview navigation">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>
        </main>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>