<?php
if (!isset($_SESSION["login"])) {
	$_SESSION["login"] = false;
	header("Location: loginpage.php");
} elseif ($_SESSION["login"] == false) {
	header("Location: loginpage.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	$user = test_input($_POST['user']);
	$msg = test_input($_POST['msg']);
	$msgfile = fopen("messages.php", "a") or die("Radās kļūda, nevarēja izdzēst!");
	$txt = 
"
\$messages[".$msg."]->checked = \"".$user."\";#".date("Y-m-d h:i:sa", time())."\n
\$messages[".$msg."]->deleted = \"".$user."\";#".date("Y-m-d h:i:sa", time())."\n
";
	fwrite($msgfile, $txt);
	fclose($msgfile);
	header("Location: http://liktenakartis.ddns.net/admin/viewMessages?m=".$msg);
}
?>