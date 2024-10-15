<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require("data.php");

$itemsPerPage = 6;
$start = 0;

$currentPage = @$_GET['page'];
$currentPage = (int)$currentPage;

if ($currentPage == 0) {
  $currentPage = 1;
}


$start = (($currentPage - 1) * $itemsPerPage); // Opgelet, arrays starten bij 0, dus 1 aftrekken.


$totalAmountOfPhotos = count($photos);
$totalAmountOfPages = ceil($totalAmountOfPhotos / $itemsPerPage);

$stop = $start + $itemsPerPage;
if ($stop > $totalAmountOfPhotos) {
  $stop = $totalAmountOfPhotos;
}

?>
<!DOCTYPE html>
<html>

<head>
  <title>
    Lego from Unsplash...
  </title>
  <link rel="stylesheet" href="https://unpkg.com/mvp.css">
</head>

<body>
  <main>

    <section>
      <header>
        <h1>Lego</h1>
        <p>Totaal foto's: <?= $totalAmountOfPhotos; ?></p>
        <p>Totaal pagina's: <?= $totalAmountOfPages; ?></p>
      </header>

      <?php
      // foreach ($photos as $index => $photo):
      for ($i = $start; $i < $stop; $i++):
      ?>

        <aside style="background-color: <?php echo $photos[$i]['color']; ?>">
          <a href="detail.php?index=<?= $i; ?>"><img src="<?php echo $photos[$i]['url']; ?>" /></a>
        </aside>

      <?php
      endfor;
      // endforeach;
      ?>

      <?php if ($currentPage < $totalAmountOfPages): ?>
        <a href="index.php?page=<?= $currentPage + 1; ?>"><b>Next</b></a>
      <?php endif; ?>

    </section>

  </main>
  <footer>
    <hr>
    <p>
      <small>Contact info</small>
    </p>
  </footer>
</body>

</html>