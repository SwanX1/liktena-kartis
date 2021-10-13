<?php
include "userdata.php";
include "messages.php";
session_start();
if (isset($_GET["m"])) {
	$messageAN = $_GET["m"];
	$messageN = $_GET["m"] + "1";
	$message = $messages[$messageAN];
} else {
	header("Location: /admin/?action=start");
}
if (!isset($_SESSION["login"])) {
	$_SESSION["login"] = false;
	header("Location: loginpage.php");
} elseif ($_SESSION["login"] == false) {
	header("Location: loginpage.php");
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
	die();
}
$username = $userdata[$user]->getData("username");
$message = $messages[$_GET["m"]];
$messagenext = $messageAN + "1";
$messageprev = $messageAN - "1";
$newMessages = array();
foreach ($messages as $key) {
	if ($key->checked == "false") {
		array_push($newMessages, $key);
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<style> 
	.animate-notif {
		-webkit-animation-name: example; /* Safari 4.0 - 8.0 */
		-webkit-animation-duration: 4s; /* Safari 4.0 - 8.0 */
		-webkit-animation-iteration-count: infinite; /* Safari 4.0 - 8.0 */
		animation-name: example;
		animation-duration: 2s;
		animation-iteration-count: infinite;
	}

	@keyframes example {
		0% {color:#fff; background-color:#f44336;}
		50% {color:#000; background-color:#fff;}
	    100% {color:#fff; background-color:#f44336;}
	}
	</style>
	<title>Admin Page</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="http://liktenakartis.ddns.net/css/style.css">
	<link rel="stylesheet" type="text/css" href="http://liktenakartis.ddns.net/css/font_style.css">
	<script src="http://liktenakartis.ddns.net/js/functions.js"></script>
</head>
<body>
	<?php include "adminnav.php";?>
	<header class="container top hide-large red xlarge padding">
		<a href="javascript:void(0)" class="button red margin-right" onclick="cstm_open()">☰</a>
		<span>Sveiki, <?php echo $username;?>!</span>
	</header>
	<div class="main" style="margin-left:340px;margin-right:40px;margin-top:80px;">
		<div class="row-padding grayscale">
			<div class="col margin-bottom">
				<div class="light-grey<?php
				if (isset($_GET["a"])) {
					if ($_GET["a"] == "none") {
						} else {echo " animate-right";}
				} else {echo " animate-right";}
				?>">
					<div class="container">
						<p><?php echo "<h3> Vēstule ".$messageN."/".count($messages)."</h3>"; ?></p>
						<p><?php if ($message->deleted == "false") {echo "Vārds: <i>".$message->name."</i>";} else { echo "Vārds: <i> [Dzēsts] </i>";}?></p>
						<p><?php if ($message->deleted == "false") {echo "E-pasts: <i>".$message->email."</i>";} else { echo "E-pasts: <i> [Dzēsts] </i>";}?></p>
						<p><?php if ($message->deleted == "false") {echo "Teksts: <br><i>".$message->text."</i>";} else { echo "Teksts: <i> [Dzēsts] </i>";}?></p>
						<?php
						if ($message->checked == "false") {
							echo "<form action=\"http://liktenakartis.ddns.net/admin/setChecked.php\" method=\"POST\" target=\"_self\"><input type=\"text\" name=\"user\" value=\"".$user."\" style=\"display:none;\"><input type=\"text\" name=\"msg\" value=\"".$messageAN."\" style=\"display:none;\"><button class=\"button yellow\" style=\"width:30%;margin-bottom:10px\">Esmu atbildējis</button><div><input type=\"checkbox\" name=\"delete\"><label>Dzēst?</label></div></form>";
						} elseif ($message->deleted == "false") {
							echo "<button class=\"button green\" style=\"width:30%;margin-bottom:10px;text-color:#fff\">Atbildēja ".$userdata[$message->checked]->getData("username")."</button>";
						} else {
							echo "<button class=\"button red\" style=\"width:30%;margin-bottom:10px;text-color:#fff\">Izdzēsa ".$userdata[$message->deleted]->getData("username")."</button>";
						}
						?>
						<br>
						<a <?php
						if ($messageN != 1) {
							echo "href='viewMessages.php?m=".$messageprev."&a=none'";
						} ?>><button class="button" style="width:50%" <?php 
						if ($messageN == 1) {
							echo "disabled";
						} ?>><-- Iepriekšējā</button></a><a <?php
						if ($messageN != count($messages)) {
							echo "href='viewMessages.php?m=".$messagenext."&a=none'";
						} ?>><button class="button" style="width:50%" <?php 
						if ($messageN == count($messages)) {
							echo "disabled";
						} ?>>Nākamā --></button></a>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>




