<?php
print '<pre>';
print_r($_POST);
print '</pre>';

$errors = [];

// Check of formulier in vorige stap verzonden werd
if (@$_POST['verzenden'] !== null) {
    // hier zijn we zeker dat submit button geklikt werd.

    // Validaties voor voornaam
    $firstname = @$_POST['firstname'];
    if (strlen($firstname) == 0) {
        $errors[] = 'Gelieve een voornaam in te vullen.';
    } else if (strlen($firstname) > 100) {
        $errors[] = 'Je voornaam is te lang...';
    }

    // Validaties voor geslacht
    $gender = @$_POST['gender'];
    if (!in_array($gender, ['f', 'm', 'x'])) {
        $errors[] = 'Gelieve je geslacht te selecteren.';
    }

    // TODO: alle andere validaties...

    if (count($errors) == 0) {
        // hier weten we dat alles ok is, insert into DB!
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>
        Members subscription
    </title>
    <style>
        ul.error {
            background-color: red;
            color: white;
        }

        .hoofdstuk {
            background-color: teal;
        }

        .vet {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <main>

        <section>
            <form method="post" action="index.php">
                <header>
                    <h2>Subscribe...</h2>
                </header>

                <?php if (count($errors)): ?>
                    <ul class="error">
                        <?php foreach ($errors as $error): ?>
                            <li><?= $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>


                <label for="firstname">Voornaam:</label>
                <input maxlength="100" type="text" id="firstname" value="<?= @$firstname; ?>" name="firstname" size="20" placeholder="Typ hier je voornaam..." />

                <label for="gender">Geslacht:</label>
                <select id="gender" name="gender">
                    <option value="0">- selecteer -</option>
                    <option value="f" <?= (@$_POST['gender'] == 'f' ? 'selected' : ''); ?>>Vrouw</option>
                    <option value="m" <?= (@$_POST['gender'] == 'm' ? 'selected' : ''); ?>>Man</option>
                    <option value="x" <?= (@$_POST['gender'] == 'x' ? 'selected' : ''); ?>>X</option>
                </select>

                <button id="verzenden" name="verzenden" type="submit">Voeg toe</button>
            </form>
        </section>

    </main>
</body>

</html>