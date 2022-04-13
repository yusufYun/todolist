<!DOCTYPE html>
<html>
<head>
	<title>TODOLIST</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/css/app.css">
</head>
<body>
	<div class="container">
		<div class="header">
			<h1>TODOLIST</h1>
			@auth
				<div class="logout">
				{{ Auth::user()->name }}
				<a href="/logout">Exit</a>
				</div>
			@endauth
		</div>
		@if (isset($register))
			@include('register')
		@else
			@auth
				@include('todolist', ['tasks' => $tasks, 'tab_num' => $tab_num])
			@else
				@include('login')
			@endauth
		@endif
	</div>
</body>
</html>