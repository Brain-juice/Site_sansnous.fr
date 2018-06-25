<?php

$user = null;

// Login / Register
if (!empty($_POST)) {
	if ($_POST['type'] == 'login') {
		foreach ($conn->query("SELECT * from users WHERE username='" . $_POST['username'] . "' AND password='" . md5($_POST['password']) .  "'") as $row) {
			$_SESSION['user'] = $row['id'];
		}
	} else if ($_POST['type'] == 'register') {
		$stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
		$stmt->bindParam(':username', $_POST['username']);
		$stmt->bindParam(':password', md5($_POST['password']));
		$stmt->execute();
	} else if ($_POST['type'] == 'logout') {
		$_SESSION['user'] = null;
		$user = null;
	}
}

// Is logged in
if (isset($_SESSION['user'])) {
	foreach ($conn->query("SELECT * FROM users WHERE id='" . $_SESSION['user'] . "';") as $row) {
		$user = $row;
	}
	include_once('logout.php');
}

if (!$user) {
	include_once('login.html');
	include_once('register.html');
}

?>