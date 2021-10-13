<?php
Class User {
	// User Data Values
	private $username;
	private $password;
	private $fullName;
	private $email;
	private $image;
	private $about;
	private $title;

	function setData($dataType,$value) {
		if ($dataType == "username") {
			$this->username = $value;
		}
		if ($dataType == "password") {
			$this->password = $value;
		}
		if ($dataType == "fullName") {
			$this->fullName = $value;
		}
		if ($dataType == "email") {
			$this->email = $value;
		}
		if ($dataType == "image") {
			$this->image = $value;
		}
		if ($dataType == "about") {
			$this->about = $value;
		}
		if ($dataType == "title") {
			$this->title = $value;
		}
	}
	function getData($dataType) {
		if ($dataType == "username") {
			return $this->username;
		}
		if ($dataType == "password") {
			return $this->password;
		}
		if ($dataType == "fullName") {
			return $this->fullName;
		}
		if ($dataType == "email") {
			return $this->email;
		}
		if ($dataType == "image") {
			return $this->image;
		}
		if ($dataType == "about") {
			return $this->about;
		}
		if ($dataType == "title") {
			return $this->title;
		}
	}
	function compareLogin($username,$password) {
		if (
			strtolower($username) == strtolower($this->username)
			&& hash("sha512",$password) == $this->password
		) {
			return true;
		} else {
			return false;
		}
	}
}
Class Page {
	public $idea_title;
	public $idea_desc;
	public $buy_title;
	public $buy_option1 = [];
	public $buy_option2 = [];
}
$pagedata = new Page();
$userdata = Array(
	new User(),
	new User(),
	new User()
);
include "database.php";