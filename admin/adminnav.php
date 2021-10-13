<?php
if (!isset($_SESSION["login"])) {
	$_SESSION["login"] = false;
	header("Location: loginpage.php");
} elseif ($_SESSION["login"] == false) {
	header("Location: loginpage.php");
}
?>
<nav class="sidebar red collapse top large <?php
if (isset($_GET["a"])) {
	if ($_GET["a"] == "none") {
		} else {echo " animate-left";}
} else {echo " animate-left";}
?>" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
	<a href="javascript:void(0)" onclick="cstm_close()" class="button hide-large display-topleft" style="width:100%;font-size:22px">Aizvērt</a>
	<div class="container">
		<h3 style="padding-bottom:24px"><b>Sveiki, <?php echo $username;?>!</b></h3>
	</div>
	<div class="bar-block">
		<a href="/admin/?" class="bar-item button hover-white">Sākums</a>
		<a href="/admin/?action=changeProfile" class="bar-item button hover-white">Rediģēt Profilu</a>
		<a href="viewMessages?m=<?php
		 if (count($newMessages) == "0") {
		 	echo '0';
		 } else {
		 	echo $newMessages[0]->arrayN($messages);
		 } 
		 ?>" class="bar-item button<?php if (count($newMessages) != "0") {echo ' animate-notif notification';} ?> hover-white">Apskatīt Vēstules<?php if(count($newMessages) != "0") {echo " (".count($newMessages).")";}?></a>
		<?php
		if ($user == "0") {
			echo "<a href=\"/admin/?action=editHomepage\" class=\"bar-item button hover-white\">Rediģēt Sākumlapu</a>";
		}
		?>
		<a href="/admin/?action=changes" class="bar-item button hover-white">Izmaiņas</a>
		<a href="https://docs.google.com/document/d/1rY6xcan-r67hQVM20Qj4lln6xBBwqUjKHiOIyZbS6ro/edit?usp=sharing" class="bar-item button hover-white">Google Drive - Ideja</a>
		<a href="https://docs.google.com/presentation/d/1yCOJlvVV9mAvD6A_Q4rja4QCj4WpdfCyIlTkjRtlq5U/edit?usp=sharing" class="bar-item button hover-white">Google Drive - Prezentācija</a>
		<a href="/admin/?action=logout" class="bar-item button hover-white">Iziet</a>
	</div>
	<div class="container" style="vertical-align:bottom;">
		<h6 class="padding-16"><b>* - Tiek ieprogrammēts</b></h6>
	</div>
</nav>
<header class="container top hide-large red xlarge padding<?php
if (isset($_GET["a"])) {
	if ($_GET["a"] == "none") {
		} else {echo " animate-top";}
} else {echo " animate-top";}
?>">
	<a href="javascript:void(0)" class="button red margin-right" onclick="cstm_open()">☰</a>
	<span>Sveiki, <?php echo $username;?>!</span>
</header>