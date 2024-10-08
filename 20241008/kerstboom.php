<html>

<head>
    <link rel="stylesheet" href="https://unpkg.com/mvp.css">
</head>

<body>
    <pre><?php
            $height = @$_GET['h'];

            if ($height === null) {
                $height = 21;
            }

            for ($i = 1; $i <= $height; $i += 2) {

                $spaces = floor(($height - $i) / 2);


                // Eerst printen we de leading spaces
                echo str_repeat("&nbsp;", $spaces);

                // nu printen we het aantal sterretjes voor deze rij
                $char = "*";
                echo str_repeat($char, $i);

                // Uiteindelijke printen we het aantal trailing spaces.
                echo str_repeat("&nbsp;", $spaces);

                echo "<br >";
            }
            ?>

    </pre>
</body>

</html>