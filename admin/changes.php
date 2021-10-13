<?php
if ($_GET["gethtml"] == "DyGQyPQKNgEm3HG48BSL") {
	include "userdata.php";
	$user = $_GET["user"];
} else {
	if ($_SESSION["login"] != true) {
		header("Location: loginpage.php");
	}
}

?>

<div class="row-padding grayscale">
	<div class="margin-bottom">
		<?php 
		include "changefile.php";
		if ($user == "0") {
			echo "<a href=\"?action=editchanges\"><button class=\"button green\">Rediģēt</button></a>";
		}
		?>
	</div>
</div>


