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
	<div class="col container margin-bottom">
		<div class="light-grey animate-bottom">
			<div class="container">
				<form action="updateProfile.php" method="post" enctype="multipart/form-data">
					Izvēlies Bildi:
					<input type="file" name="image" id="fileToUpload">
					<h3>
						<input type="text" name="fullName" value="<?php echo $userdata[$user]->getData('fullName'); ?>">
					</h3>
					<p>
						<input type="text" name="title" value="<?php echo $userdata[$user]->getData('title'); ?>">
					</p>
					<p>
						<textarea name="about">
							<?php echo $userdata[$user]->getData('about'); ?>
						</textarea>
					</p>
					<input type="text" name="user" value="<?php echo $user; ?>" style="display:none;">
					<input type="submit" value="Saglabāt" name="submit">
				</form>
			</div>
		</div>
	</div>
</div>


