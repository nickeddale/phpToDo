<?php

session_start();

$_SESSION['user_id'] = 1;

db = new PDO('mysql:dbname=phpToDo;host=localhost', 'root', '1161')
 

if (!isset($_SESSION['user_id'])) {
	die('You are not logged in');
};

