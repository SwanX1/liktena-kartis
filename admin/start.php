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
	<div class="col m4 margin-bottom">
		<div class="light-grey animate-zoom">
			<img src="<?php echo $userdata[$user]->getData('image'); ?>" alt="foto nav atrasts" style="width:100%">
			<div class="container">
				<h3><?php echo $userdata[$user]->getData('fullName'); ?></h3>
				<p class="opacity"><?php echo $userdata[$user]->getData('title'); ?></p>
				<p><?php echo $userdata[$user]->getData('about'); ?></p>
			</div>
		</div>
	</div>
</div>


