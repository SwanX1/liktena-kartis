<?php
session_start();
if (!isset($_SESSION["login"])) {
	$_SESSION["login"] = false;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	include "userdata.php";
	$error = true;
	$user = test_input($_POST["user"]);
	$password = test_input($_POST["password"]);
	foreach ($userdata as $key) {
		if ($key->compareLogin($user,$password)) {
			$error = false;
		}
	}
	if ($error) {
		header("Location: ?error=true");
	} elseif (!$error) {
		$_SESSION["login"] = true;
		$_SESSION["user"] = $user;
		header("Location: /admin/");
	}
} else {
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>403 Piekļuve Liegta</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="http://liktenakartis.ddns.net/css/style.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
	<link rel="stylesheet" type="text/css" href="http://liktenakartis.ddns.net/css/font_style.css">
	<script src="http://liktenakartis.ddns.net/js/functions.js"></script>
</head>
<body>
	<header class="container top xlarge padding">
		<span>Likteņa Kārtis</span>
	</header>
	<div class="main container">
		<br><br><p>Tev vajag ielogoties:</p>
		<hr>
		<?php if (isset($_GET["error"])) { echo "<p style=\"color:#ee0000\">Nepareiza parole un/vai lietotājvārds.</p>"; } ?>
		<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			<div>
				<label>Lietotājvārds</label><br>
				<input type="text" name="user" style="width:15%" required>
			</div>
			<div>
				<label>Parole</label><br>
				<input type="password" name="password" style="width:15%" required>
			</div>
			<div>
				<button type="submit" class="button block padding-large" style="width:15%">Ielogoties</button>
			</div>
		</form>
		<hr>
		<address>
			Administrātora logina lapa. 
			<a href="http://liktenakartis.ddns.net">
				liktenakartis.ddns.net
			</a>
		</address>
	</div>
</body>
</html>
