<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Een nieuwe variable met naam $name definieren:
$name = "Voornaam Naam"; // Wordt niet meer gebruikt

$id = @$_GET['volgnummer'];

// $firstname = "Voornaam";
// $lastname = "Familienaam";


if ($id == 1) {
  $firstname = "Vinnie";
  $lastname = "Stoop";
} elseif ($id == 2) {
  $firstname = "Nicolas";
  $lastname = "Van Lankveld";
} else {
  $firstname = "Voornaam";
  $lastname = "Familienaam";
}


// switch ($id) {
//   case 1:
//     $firstname = "Vinnie";
//     $lastname = "Stoop";
//     break;
//   case 2:
//     $firstname = "Nicolas";
//     $lastname = "Van Lankveld";
//     break;
//   default:
//     $firstname = "Voornaam";
//     $lastname = "Achternaam";
//     break;
// }




?>
<html>

<head>
  <title>Portfolio <?php echo "$firstname $lastname"; ?></title>
  <!-- We gebruiken MVP's CSS -->
  <link rel="stylesheet" href="https://unpkg.com/mvp.css">
</head>

<body>
  <main>
    <h1><?php echo "$firstname $lastname"; ?></h1>
    <h2>Docent Full Stack Developer</h2>
    <p>
      Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc in fringilla
      nunc. Suspendisse lobortis enim a urna rhoncus, sit amet molestie ipsum
      malesuada. Ut sit amet nisi mollis, ultricies diam at, hendrerit sem.
      Maecenas mollis metus id lobortis molestie. Mauris dignissim sagittis enim
      eget lobortis. Nulla feugiat elementum scelerisque. Nulla imperdiet
      blandit ligula. Quisque at miut est tempus luctus sollicitudin ut dui.
      Nunc nunc tellus, laoreet non mauris at, auctor efficitur ante. Morbi eget
      maximus nisi. Sed porttitor elit at arcu dignissim, sit amet tincidunt
      velit interdum. Ut malesuada arcu sit amet elit tincidunt, a tincidunt
      magna aliquam. Suspendisse non tempus enim, non venenatis ligula. Maecenas
      ultrices, metus in fermentum accumsan, ante turpis maximus metus, id
      lacinia sem metus a leo. Cras ex risus, tincidunt eget porttitor ut,
      pellentesque ac libero.
    </p>

    <p>
      Vivamus tortor massa, volutpat eu condimentum pellentesque, accumsan id
      purus. Nam lorem erat, volutpat sed diam ut, volutpat fermentum quam.
      Fusce eget lacus eget dolor volutpat interdum sit amet et dolor. Ut
      sagittis, felis nec iaculis bibendum, leo ligula volutpat nisi, sit amet
      interdum quam nisl et est. Praesent tristique fringilla nibh, ut dictum
      leo. Suspendisse tristique sit amet velit non gravida. Nunc quis felis
      vitae turpis hendrerit malesuada vitae a mi.
    </p>

    <ul>
      <li>
        <a
          href="http://be.linkedin.com/in/kristofgrenson"
          title="Kristof Grnson's profiel op LinkedIn.com">http://be.linkedin.com/in/kristofgrenson</a>
      </li>
      <li>
        <a href="mailto:kristof@nizer.be?subject=Contact via de website...">kristof@nizer.be</a>
      </li>
    </ul>
  </main>
  <footer>
    <hr>
    <p>
      <small>&copy; Copyright 2024 by <?php echo "$firstname $lastname"; ?></small>
    </p>
  </footer>
</body>

</html>