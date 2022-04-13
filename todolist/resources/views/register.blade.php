<div class="login-form">
<form action="/registration" method="post">
	@csrf
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" name="username" class="form-control" id="username"  placeholder="username">
    </div>
	<div class="form-group">
    <label for="login">login</label>
    <input type="login" name="login" class="form-control" id="login"  placeholder="Login">
  	</div>
   <div class="form-group">
    <label for="email">Email</label>
    <input type="text" name="email" class="form-control" id="email"  placeholder="Email">
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="password2">Repeat password</label>
    <input type="password" name="password2" class="form-control" id="password2" placeholder="Repeat password">
  </div>
  <div class="form-check">
  		@if ($errors->any())
  			<strong>{{ $errors->first() }}</strong>
  		@endif
  </div>
  <input type="submit" class="btn btn-primary" value="Submit">
</form>
</div>