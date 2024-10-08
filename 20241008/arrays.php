<?php

$getal = 123;

$list = ["Vinnie", "Nicolas", "Joppe", "Kevin"];
$list[] = "Matthice";
// echo $list[4];

// echo "<pre>";
// print_r($list);
// var_dump($list);
// echo "</pre>";
// exit;
?>
<html>

<head>
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">
</head>

<body>
    <main>
        <ul>
            <?php

            // for ($i = 0; $i < count($list); $i++) {
            //     echo "<li>$list[$i]</li>";
            // }

            foreach ($list as $person) {
                echo "<li>$person</li>";
            }

            ?>

        </ul>
    </main>
</body>

</html>