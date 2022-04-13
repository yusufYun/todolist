<div class="users-list">
			<h4>Users</h4>

			<ul class="user-list-content">
			<li class="header-li">
				<div>Username</div>
				<div>Email</div>
				<div>State</div>
				<div></div>
			</li>
			@foreach ($users as $user)
				<li>
					<span class="user-info-block">
					<a href="/admin/user_info/{{ $user->id }}">{{ $user->name }}</a>
					</span>
					<div>
						{{ $user->email }}
					</div>
					<div>
						<em>{{ $user->is_blocked ? 'Blocked': 'Active' }} /
						@if ($user->is_blocked)
							<a href="/admin/unblock/{{ $user->id }}">Unblock</a>
						@else
							<a href="/admin/block/{{ $user->id }}">Block</a>
						@endif</em>
					</div>
					<div class="users-list-row">
						<a href="/admin/delete_user/{{ $user->id }}" class="btn btn-danger">Remove</a>
					</div></li>
			@endforeach
			</ul>
</div>