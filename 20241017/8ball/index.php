<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$answers = [
    'It is certain.',
    'It is decidedly so.',
    // 'Without a doubt.',
    // 'Yes definitely.',
    // 'You may rely on it.',
    // 'As I see it, yes.',
    // 'Most likely.',
    // 'Outlook good.',
    // 'Yes.',
    // 'Signs point to yes.',
    // 'Reply hazy, try again.',
    // 'Ask again later.',
    // 'Better not tell you now.',
    // 'Cannot predict now.',
    // 'Concentrate and ask again.',
    // 'Don\'t count on it.',
    // 'My reply is no.',
    // 'My sources say no.',
    // 'Outlook not so good.',
    'Very doubtful.',
];

function getRandomAnswer($excl) // Deze functie returnt een random KEY (getal dus)
{
    global $answers;
    do {
        $random = array_rand($answers);
    } while ($random == $excl);

    return $random;
}

$previousKey = @$_GET['p'];

$newKey = getRandomAnswer($previousKey);
$answer = $answers[$newKey];
?>
<!DOCTYPE html>
<html>

<head>
    <title>
        Magic 8-Ball
    </title>
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">
</head>

<body>
    <main align="center">

        <?php if ($previousKey !== null): ?>

            <h2><?= $answer; ?></h2>
            <a href="?p=<?= $newKey; ?>"><b>ASK AGAIN</b></a>

        <?php else: ?>

            <a href="?p=<?= $newKey; ?>"><b>ASK 8-BALL</b></a>

        <?php endif; ?>

    </main>
</body>

</html>