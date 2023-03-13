<?php

$imagel "fingerprint";

$image2 = "fingerprint_given";

$md5image1 md5(file_get_contents($image1)); 

$md5image2 md5(file_get_contents($image2));

if ($md5image1 = $md5image2) {

echo "Same as....";

} elsef{
echo "Please Try Another";
}
?>