<?php
include "userdata.php";
include "messages.php";
session_start();
if (isset($_GET["action"])) {
	if ($_GET["action"] == "logout") {
		session_unset();
		session_destroy();
		header("Location: http://liktenakartis.ddns.net/");
	} else {
		$pageID = $_GET["action"];
	}
} else {
	header("Location: ?action=start");
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
	session_unset();
	session_destroy();
	die();
}
$username = $userdata[$user]->getData("username");
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
	<title>Admin Page</title>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="http://liktenakartis.ddns.net/css/style.css">
	<link rel="stylesheet" type="text/css" href="http://liktenakartis.ddns.net/css/font_style.css">
	<script src="http://liktenakartis.ddns.net/js/functions.js"></script>
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
</head>
<body>
	<?php include "adminnav.php";?>
	<div class="main" style="margin-left:340px;margin-right:40px">
		<?php 
		if ($_GET["action"] != "editchanges") {
			echo "<div class=\"container\" style=\"margin-top:80px\">
	<h1 class=\"jumbo\"><b>Administratora Lapa</b></h1>
</div>\n";
		}
			echo file_get_contents("http://liktenakartis.ddns.net/admin/".$pageID.".php?gethtml=DyGQyPQKNgEm3HG48BSL&user=".$user);
		?>
	</div>
</body>
</html>




