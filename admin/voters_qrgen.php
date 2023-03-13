 <?php
    include 'includes/session.php';

	if (isset($_POST["generate"])) {
		$voter_id = $_POST["voterid"];
            /*echo "<pre>";
            var_dump($_POST);
            echo "</pre>";*/
}
?>
<?php
    include "phpqrcode/qrlib.php";
 	$PNG_TEMP_DIR = 'temp/';
 	if (!file_exists($PNG_TEMP_DIR))
	    mkdir($PNG_TEMP_DIR);
        $filename = $PNG_TEMP_DIR . 'test.png';
		if (isset($_POST["generate"])) {
		$codeString = $_POST["voterid"] . "\n";
		$filename = $PNG_TEMP_DIR . 'test' . md5($codeString) . '.png';
		QRcode::png($codeString, $filename);
		echo '<img src="' . $PNG_TEMP_DIR . basename($filename) . '" /><hr/>';
		}
		$_SESSION['success'] = 'Qr Code Generated successfully';
		header('location: voters.php');
?>
