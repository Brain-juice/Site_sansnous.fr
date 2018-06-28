<?php

$user = 'root';
$pass = '';
try {
    $conn = new PDO('mysql:host=localhost;dbname=sansnous;charset=utf8', $user, $pass);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

?>