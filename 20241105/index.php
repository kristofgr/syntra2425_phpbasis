<?php
include('db.inc.php');

$tasks = getTasks();
?>
<!DOCTYPE html>
<html>

<head>
    <title>
        PHP todo app...
    </title>
    <style>
        ul.error {
            background-color: red;
            color: white;
        }
    </style>
</head>

<body>
    <main>

        <section id="overview">
            <header>
                <h2>Taken</h2>
            </header>
            <ul>
                <?php foreach ($tasks as $task): ?>
                    <li>
                        <?= $task['name']; ?>
                        <form method="post" action="index.php">
                            <input type="hidden" id="taakId" name="taakId" value="<?= $task['id']; ?>">
                            <button type="submit">Markeer als klaar</button>
                        </form>
                    </li>
                <?php endforeach; ?>
            </ul>
        </section>

        <section id="addform">
            <form method="post" action="index.php">
                <header>
                    <h2>Toevoegen</h2>
                </header>

                <?php if (count($errors)): ?>
                    <ul class="error">
                        <?php foreach ($errors as $error): ?>
                            <li><?= $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>


                <label for="taak">taak:</label>
                <input type="text" id="taak" value="<?= $newTask; ?>" name="taak" size="20" placeholder="Voeg hier een taak toe...">

                <!-- <label for="select1">Select label:</label>
                <select id="select1">
                    <option value="option1">option1</option>
                    <option value="option2">option2</option>
                </select> -->

                <button type="submit">Voeg toe</button>
            </form>
        </section>

    </main>
</body>

</html>