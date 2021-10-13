<?php
$visittype = "homepage";
function get_ip_address(){
		foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
				if (array_key_exists($key, $_SERVER) === true){
						foreach (explode(',', $_SERVER[$key]) as $ip){
								$ip = trim($ip); // just to be safe
								if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
										return $ip;
								}
						}
				}
		}
}
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
include "admin/userdata.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$ip = get_ip_address();
	$name = test_input($_POST['name']);
	$email = test_input($_POST['email']);
	$message = test_input($_POST['message']);
	$msgfile = fopen("admin/messages.php", "a") or die("Radās kļūda, nevarēja nosūtīt ziņu!");
	$txt = "
#".date("Y-m-d h:i:sa", time() + '18000')."

array_push(\$messages,
newMessage(
\"".$ip."\",
\"".$name."\",
\"".$email."\",
\"".$message."\"
));
";
	fwrite($msgfile, $txt);
	fclose($msgfile);
	$visittype = "homepage_submit";
}
$visitfile = fopen("admin/visits.php", "a") or die("Radās kļūda 001. Lūdzu ziņot karliscern@gmail.com");
$visitcode="
array_push(\$visits, newvisit(
\"".test_input(date("Y-m-d h:i:sa", time() + '18000'))."\",
\"".get_ip_address()."\",
\"".$visittype."\"
));\n";
fwrite($visitfile, $visitcode);
fclose($visitfile);
include "admin/homepage.php";
if ($visittype == "homepage_submit") {
	include "admin/message_sent.php";
}
?>