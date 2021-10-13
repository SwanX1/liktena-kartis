<?php
class Message {
	public $ip;
	public $name;
	public $email;
	public $text;
	public $checked;
	public $deleted;
	function arrayN($array) {
		return array_search($this, $array);
	}
};
function newMessage($ip,$name,$email,$text) {
	$temp = new Message();
	$temp->ip = $ip;
	$temp->name = $name;
	$temp->email = $email;
	$temp->text = $text;
	$temp->checked = "false";
	$temp->deleted = "false";
	return $temp;
};
$messages = Array();
array_push($messages,
newMessage(
"localhost",
"-",
"-",
"Ielikta testa ziņa.
&quot; ' &lt; &gt; ! # $ % &amp; ^ ( ) [ ] { } ; : |  \ - _ + = ~ ` . , ¡ ¢ £ ¤ ¥ ₹ § © ® ¶ µ"
));
$messages[0]->checked = "0"; #2019-10-25 04:10:25pm
