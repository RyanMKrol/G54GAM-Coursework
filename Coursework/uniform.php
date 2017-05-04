<?php

  mkdir("./uniform");
  // scans the directory and gets data I need
  $files = scandir("./");

  $width = 0;
  $height = 0;

  foreach($files as $file) {

    if (strpos($file, 'png') !== false) {
      list($i_width, $i_height, $dummy, $dummy) = getimagesize ($file);

      $height = max($height, $i_height);
      $width = max($width, $i_width);

    }
  }

  // creates new images of uniform size from here
  foreach($files as $file) {

    if (strpos($file, 'png') !== false) {
      resize($width, $height, "uniform/new_" . $file, $file);
    }
  }

  // have to find the dir size manually because hidden files are included in scandir
  $dirSize = 0;
  $files = scandir("./uniform");

  foreach($files as $file) {
    if (strpos($file, 'png') !== false && strpos($file, 'spriteSheet') === false) {
      $dirSize++;
    }
  }

  echo $dirSize . "\n";

  $numCols = ceil(sqrt($dirSize));
  $numRows = ceil(sqrt($dirSize));

  echo $numCols . "\n";
  echo $numRows . "\n";

  $sheetWidth = $numCols * $width;
  $sheetHeight = $numRows * $height;

  echo $sheetWidth . "\n";
  echo $sheetHeight . "\n";

  // base sprite sheet that will contain all of the images
  $tmp = imagecreate($sheetWidth, $sheetHeight);

  $counter = 0;

  // puts all of the uniform sized pngs into a grid for use in unreal engine
  foreach($files as $file) {

    $file = "./uniform/" . $file;

    if (strpos($file, 'png') !== false && strpos($file, 'spriteSheet') === false) {

      $x = floor($counter%$numCols);
      $y = floor($counter/$numCols);

      $img = imagecreatefrompng($file);

      imagecopy($tmp, $img, $x * $width, $y * $height, 0, 0, $width, $height);

      $counter++;
    }
  }

  imagepng($tmp, "./uniform/spriteSheet.png");

?>

<?php

// http://stackoverflow.com/questions/13596794/resize-images-with-php-support-png-jpg
function resize($newWidth, $newHeight, $targetFile, $originalFile) {

    $img = imagecreatefrompng($originalFile);
    list($width, $height) = getimagesize($originalFile);

    $newHeight = $newHeight;
    $tmp = imagecreate($newWidth, $newHeight);
    imagecopy($tmp, $img, 0, $newHeight-$height, 0, 0, $width, $height);

    if (file_exists($targetFile)) {
            unlink($targetFile);
    }
    imagepng($tmp, "$targetFile");
}

?>
