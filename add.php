<?php

require_once 'app/init.php';

if(isset($_POST['name'])) {
	$name = trim($_POST['name']);




	if(!empty($name)) {
		try {
			$addedQuery = $db->prepare("
				INSERT INTO users (name, user, done, created)	
				VALUES (:name, :user, 0, NOW())
				");
			} catch(PDOException $e) {
			    echo 'ERROR: ' . $e->getMessage();
			}
		
		try {
			$addedQuery->execute([
				'name' => $name,
				'user' => $_SESSION['user_id']
			]);
			} catch(PDOException $e) {
			    echo 'ERROR: ' . $e->getMessage();
			}
	}
}

header('Location: index.php')

?>
