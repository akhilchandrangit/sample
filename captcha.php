<?php
  session_start();
  header("Content-type: image/png");
  $string = '';
  for ($i = 0; $i < 5; $i++) {
    // this numbers refer to numbers of the ascii table (lower case)
    $string .= chr(rand(97, 122));
  }
  $_SESSION['rand_code'] = $string;
  $dir = 'fonts/';
  $image = imagecreatetruecolor(170, 60);
  $black = imagecolorallocate($image, 0, 0, 0);
  $color = imagecolorallocate($image, 200, 100, 90); // red
  $white = imagecolorallocate($image, 255, 255, 255);
  imagefilledrectangle($image,0,0,399,99,$white);
  imagettftext ($image, 30, 0, 0, 40, $black, './font.ttf', $_SESSION['rand_code']);
  imagepng($image);
?>