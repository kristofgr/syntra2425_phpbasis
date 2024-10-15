<?php
$index = @$_GET['index'];

include('data.php');
$element = $photos[$index];
?>

<pre>
    <?php print_r($element); ?>
    <?php print_r($_GET); ?>
</pre>


<!-- <img src="<?php echo $img; ?>&w=250" /> -->