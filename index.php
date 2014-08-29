<?php 

require_once 'app/init.php';

$itemsQuery= $db->prepare("
	SELECT id, name, done
	FROM users
	WHERE user = :user
");

$itemsQuery->execute([
	'user' => $_SESSION['user_id'],
	]);

$items = $itemsQuery->rowCount() ? $itemsQuery : []; 

/*
if the row count of items query is a positive number (designated by '?') serve up $itemsQuery array
otherwise, serve up an empty array (':' is the otherwise operator)
*/

?>



<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>To Do</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link href='http://fonts.googleapis.com/css?family=Roboto|Nothing+You+Could+Do' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/main.css">

</head>
<body>
	<div class="list">
		<h1 class="header">To Do</h1>

		<?php if (!empty($items)): ?>
		<ul class="items">

			<?php foreach($items as $item): ?>
				<li class="item">
					<span class="item<?php echo $item['done'] ? ' done' : '';?>"><?php echo $item['name'];?></span>
					<?php if(!$item['done']):?>
						<a href="mark.php?as=done&item=<?php echo $item['id']; ?>" class="done-button">Mark as done</a>
					<?php endif;?>	
				</li>
			<?php endforeach; ?>	
		</ul>
		<?php else: ?>
			<p>You haven't added any items yet.</p>
		<?php endif; ?>

		<form class="item-add" action="add.php" method="post">
			<input type="text" name="name" placeholder="Type a new item here" class="input" autocomplete="off" required>
			<input type="submit" Value="add" class="submit">
		</form>
	</div>
</body>
</html>