<?php
print '<pre>';
print_r($_POST);
print '</pre>';
?>
<!DOCTYPE html>
<html lang="en" data-lt-installed="true">

<head>
    <link rel="icon" href="https://via.placeholder.com/70x70">
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">

    <meta charset="utf-8">
    <meta name="description" content="Eerste forms...">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Formulieren</title>
</head>

<body>
    <main>
        <section>
            <header>
                <h1>Subscribe</h1>
            </header>
            <p>schrijf je in via onderstaand formulier.</p>

            <form action="index.php" method="get">
                <label for="firstname">Voornaam *:</label>
                <input type="text" name="firstname" id="firstname" placeholder="type hier jouw voornaam..." required />

                <label for="lastname">Familienaam *:</label>
                <input type="text" name="lastname" id="lastname" placeholder="type hier jouw familienaam..." required />

                <label for="email">E-mailadres *:</label>
                <input type="email" name="email" id="email" placeholder="Vul je e-mail in..." required />

                <label for="gender">Geslacht:</label>
                <input type="radio" name="gender" id="genderMale" value="male" /> <label for="genderMale">Man</label>
                <input type="radio" name="gender" id="genderFemale" value="female" /> <label for="genderFemale">Vrouw</label>
                <input type="radio" name="gender" id="genderX" value="x" /> <label for="genderX">X</label><br />

                <label for="cars">Met welke auto rij je?</label>
                <select id="cars" name="cars">
                    <option>Selecteer</option>
                    <option value="volvo">Volvo</option>
                    <option value="saab" selected="selected">Saab</option>
                    <option value="fiat">Fiat</option>
                    <option value="audi">Audi</option>
                </select>

                <label for="message">Jouw bericht:</label>

                <textarea id="message" name="message" rows="25" cols="50" placeholder="test..."></textarea>

                <input type="submit" name="submit" id="submit" value="verzenden" />
            </form>

        </section>
    </main>
</body>