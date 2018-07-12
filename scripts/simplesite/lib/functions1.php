<?php

	$mysqli = false;
	function connectDB() {
		global $mysqli;
		$mysqli = new mysqli("localhost", "root", "", "mysite-local");
		$mysqli->query("SET NAMES 'utf8',");
	}

	function getAllArticles() {
		global $mysqli;
		connectDB();
		$result_set = $mysqli->query("SELECT * FROM `articles`");
		closeDB();
		return resultSetToArray($result_set);
	}

	function getAllBanners() {
		global $mysqli;
		connectDB();
		$result_set = $mysqli->query("SELECT * FROM `banners`");
		closeDB();
		return resultSetToArray($result_set);
	}

	function getAllGuestBookComments () {
		global $mysqli;
		connectDB();
		$result_set = $mysqli->query("SELECT * FROM `guestbook`");
		closeDB();
		return resultSetToArray($result_set);
	}

	 function addGuestBookComment($name, $comment) {
	 	global $mysqli;
		connectDB();
$success = $mysqli->query("INSERT INTO `guestbook` (`name`,`comment`) VALUES ('$name', '$comment')");
		closeDB();
		return $success;
	 }

	  function addUser ($email, $password) {
	 	global $mysqli;
		connectDB();
$success = $mysqli->query("INSERT INTO `users`(`email`, `password`) VALUES ('$email', '$password')");
		closeDB();
		return $success;
	 }

	function getArticle($id) {
		global $mysqli;
		connectDB();
		$result_set = $mysqli->query("SELECT * FROM `articles` WHERE `id`='$id'");
		closeDB();
		return $result_set->fetch_assoc();
	}
	
	function resultSetToArray($result_set) {
		$array = array();
		while (($row = $result_set->fetch_assoc()) !=false) 
		$array [] = $row;
		return $array;
		}

	function closeDB() {
		global $mysqli;
		$mysqli->close();
	}
?>
