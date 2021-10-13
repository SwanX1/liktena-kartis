<?php
if ($_GET["gethtml"] == "DyGQyPQKNgEm3HG48BSL") {
	include "userdata.php";
	$user = $_GET["user"];
} else {
	if ($_SESSION["login"] != true) {
		header("Location: loginpage.php");
	}
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$contents = $_POST["contents"];
	$file = fopen("changefile.php", "w") or die("Radās kļūda, nevarēja saglabāt!");
	fwrite($file, $contents);
	fclose($file);
	header("Location: http://liktenakartis.ddns.net/admin/?action=changes");
}
?>

<div class="row-padding grayscale">
	<div class="margin-bottom">
		<div class="light-grey container animate-zoom padding margin" align="center">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			<textarea name="contents" style="width:100%; height:600px;"><?php include "changefile.php";?>
			</textarea>
			<div align="right">
				<button class="button green margin" name="submit">Saglabāt</button>
			</div>
		</div>
	</div>
</div>


