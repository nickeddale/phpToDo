<?php

session_start();

$_SESSION['user_id'] = 1;

$username = 'root';
$password = 'root';

try {
    $db = new PDO('mysql:host=localhost;dbname=phpToDo', $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}

if (!isset($_SESSION['user_id'])) {
	die('You are not logged in');
};

?>