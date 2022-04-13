<div class="add-task-form">
			<form action="/add_task" method="post">
				@csrf
				<label for="task_name"><h4>New task</h4></label>
				<div class="form-content">
					<input type="text" name="task_desc" class="form-control">
					<input type="submit" name="add_task" value="Add task" class="btn btn-info">
				</div>
			</form>
		</div>
		<br><hr>
		<div class="tasks-list">
			<h4>Task list</h4>
			<br>
			<div class="task-tabs">
			<ul class="nav nav-tabs">
  				<li class="nav-item">
    				<a class="nav-link {{ $tab_num == 0 ? 'active' :'' }}" aria-current="page" href="/">All</a>
  				</li>
  				<li class="nav-item">
    				<a class="nav-link {{ $tab_num == 1 ? 'active':'' }}" href="/tasks/1">Active</a>
  				</li>
  				<li class="nav-item">
    				<a class="nav-link {{ $tab_num == 2 ? 'active':'' }}" href="/tasks/2">Completed</a>
  				</li>
			</ul>
			</div><br>
			<ul class="task-list-content">
			@foreach ($tasks as $task)
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
					<a href="#" onclick="toggle({{ '\'change_state_'.$task->id.'\'' }})">change state</a>
					</span>
					<div class="{{ $task->state == 'completed' ? 'task-completed':''}}">
						{{ $task->description }}
					</div>
					<div>
						<form action="/deltask/{{ $task->id }}" method="get">
							@csrf
							<input type="submit" class="btn btn-danger" value="X">
						</form>
					</div></li>
					<li class="change-state-form" id="change_state_{{ $task->id }}" style="display:none;">
						<form action="/change_state/{{ $task->id }}" method="post">
							@csrf
							<div class="form-content">
							<select class="form-control" name="state">
								<option {{ $task->state == 'in_expect' ? 'selected':'' }} value="in_expect">pending</option>
								<option {{ $task->state == 'in_progress' ? 'selected':'' }} value="in_progress">in developing</option>
								<option {{ $task->state == 'in_testing' ? 'selected':'' }} value="in_testing">on testing</option>
								<option {{ $task->state == 'in_checking' ? 'selected':'' }} value="in_checking">checking</option>
								<option {{ $task->state == 'completed' ? 'selected':'' }} value="completed">completed</option>
							</select>
							<input type="submit" class="btn btn-info" value="Save">
							</div>
						</form>
					</li>
			@endforeach
			</ul>
		</div>

<script type="text/javascript">
	function toggle(id) {
		var ch_form = document.getElementById(id);
		ch_form.style.display = (ch_form.style.display == 'none') ? '': 'none';
	}
</script>