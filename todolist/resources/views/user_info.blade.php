<div class="container">
	<div class="uinfo_header">
		<h3>{{ $user->name }} / <a href="/admin">All users</a></h3>
		<div class="uinfo_btn">
			<a href="/admin/delete_user/{{ $user->id }}" class="btn btn-danger">Remove user</a>
		</div>
	</div>
	<table class="table">
		<tr>
			<td>Email: </td><td>{{ $user->email }}</td>
		</tr>
		<tr>
			<td>Login: </td><td>{{ $user->login }}</td>
		</tr>
		<tr>
			<td>State: </td><td><em>{{ $user->is_blocked ? 'Blocked': 'Active' }} /
						@if ($user->is_blocked)
							<a href="/admin/unblock/{{ $user->id }}">Unblock</a>
						@else
							<a href="/admin/block/{{ $user->id }}">Block</a>
						@endif</em></td>
		</tr>
		<tr>
	<td>Task list</td>
	<td>
	<ul class="task-list-content">
			@foreach ($user->tasks as $task)
				<li><span class="tasks-list-row">
					<strong class="{{ $task->state }}">
					@switch ($task->state)
						 	@case('in_expect')
						 		pending
						 		@break
						 	@case('in_progress')
						 		in developing
						 		@break
						 	@case('in_testing')
						 		on testing
						 		@break
						 	@case('in_checking')
						 		checking
						 		@break
						 	@case('completed')
						 		completed
						 		@break
						 	@default
						 		pending
						 		@break
					@endswitch
					</strong>
					</span>
					<div class="{{ $task->state == 'completed' ? 'task-completed':''}}">
						{{ $task->description }}
					</div>
				</li>
				@endforeach
			</ul>
		</td>
	</tr>
</table>
</div>