<?php

session_start();

require_once "setup_pdo.php";
require_once "user.php";

if ($user) {
	echo "User id is " . $user['id'] . "<br>";
} else {
	echo "User is not logged in " . $user . "<br>";
}

?>