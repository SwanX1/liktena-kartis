<?php
session_start();
include "userdata.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	if (isset($_FILES["image"]["name"])) {
		$target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
				$check = getimagesize($_FILES["image"]["tmp_name"]);
				if($check !== false) {
						echo "Fails ir bilde - " . $check["mime"] . ".";
						$uploadOk = 1;
				} else {
						echo "Fails nav bilde.";
						$uploadOk = 0;
				}
		}
		// Check if file already exists
		if (file_exists($target_file)) {
				echo "Fails jau eksistē.";
				$uploadOk = 0;
		}
		// Check file size
		if ($_FILES["image"]["size"] > 1000000) {
				echo "Fails ir pārāk liels.";
				$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
				echo "Tikai JPG, JPEG, PNG un GIF faili ir atļauti.";
				$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
				echo "Fails netika augšupielādēts.";
		// if everything is ok, try to upload file
		} else {
				if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
						echo "Fails ". basename( $_FILES["image"]["name"]). " tika augšupielādēts.";
						$fileuploadsuccessful = true;
				} else {
						echo "Notika kļūda augšupielādējot failu.";
				}
		}
	}
	function updateDatabase($user,$dataType,$value) {
		$datafile = fopen("database.php", "a") or die("Radās kļūda, nevarēja saglabāt!");
		$txt = "\$userdata[".$user."]->setData('".$dataType."','".$value."');#".date("Y-m-d h:i:sa", time())."\n";
		fwrite($datafile, $txt);
		fclose($datafile);
		}
	}
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	foreach ($userdata as $key) {
	if (!isset($user)) {
			if ($key->getData("username") == $_SESSION["user"]) {
				$user = array_search($key, $userdata);
			}
		}
	}
	if (!isset($user)) {
		echo "Unexpected error!";
		session_unset();
		session_destroy();
		die();
	}
	$fullName = test_input($_POST["fullName"]);
	$title = test_input($_POST["title"]);
	$about = test_input($_POST["about"]);
	if ($userdata[$user]->getData("fullName") != $fullName) {
		updateDatabase($user,"fullName",$fullName);
	}
	if ($userdata[$user]->getData("title") != $title) {
		updateDatabase($user,"title",$title);
	}
	if ($userdata[$user]->getData("about") != $about) {
		updateDatabase($user,"about",$about);
	}
	if ($target_file != "uploads/") {
		updateDatabase($user,"image","http://liktenakartis.ddns.net/admin/".$target_file);
	}
header("Location: http://liktenakartis.ddns.net/admin/")
?>
