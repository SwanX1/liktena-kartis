<?php
Class visit {
	// User Data Values
	public $time;
	public $ip;
	public $type;
}
function newvisit($time,$ip,$type) {
	$temp = new visit();
	$temp->time = $time;
	$temp->ip = $ip;
	$temp->type = $type;
	return $temp;
}
$visits = Array();