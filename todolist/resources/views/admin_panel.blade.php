<!DOCTYPE html>
<html>
<head>
	<title>TODOLIST</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body>
	<div class="header">
			<h1>Admin Panel</h1>
				<div class="logout">
				{{ Auth::user()->name }}
				<a href="/logout">Exit</a>
				</div>
		</div>
	<div class="container">
		<?php echo  $content ?>
	</div>
</body>
</html>