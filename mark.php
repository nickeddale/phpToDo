<?php

require_once 'app/init.php';

if (isset($_GET['as'], $_GET['item'])) {
 	
 	$as 	= $_GET['as'];
 	$item 	= $_GET['item'];

 	switch ($as) {
 		case 'done':
 			
	 			$doneQuery = $db->prepare("
						UPDATE users
						SET done = 1
						WHERE id = :item
						AND user = :user
	 				");

	 			try {
	 				 $doneQuery->execute([
	 					'item' => $item,
	 					'user' => $_SESSION['user_id']
 					]);
	 			} catch (Exception $e) {
	 				echo 'ERROR: ' . $e->getMessage();
	 			}
 			break;

 		case 'undone':
 	 			$doneQuery = $db->prepare("
						UPDATE users
						SET done = 0
						WHERE id = :item
						AND user = :user
	 				");

	 			try {
	 				 $doneQuery->execute([
	 					'item' => $item,
	 					'user' => $_SESSION['user_id']
 					]);
	 			} catch (Exception $e) {
	 				echo 'ERROR: ' . $e->getMessage();
	 			}
 			break;			
 		
 	};
};

header('Location: index.php')


?>