<?php

require_once 'app/init.php';

$deleteDone = $db->prepare("
		DELETE from users 
		WHERE done = 1
		AND user = :user
	");

try {
	$deleteDone->execute([
		'user' => $_SESSION['user_id']
		]);
	
} catch (PDOException $e) {
	echo 'ERROR: ' . $e->getMessage();
}

header('Location: index.php')


?>