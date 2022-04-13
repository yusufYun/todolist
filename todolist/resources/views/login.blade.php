<div class="login-form">
<form action="/login" method="post">
	@csrf
	<div class="form-group">
    <label for="login">login</label>
    <input type="login" name="login" class="form-control" id="login"  placeholder="Login">
  	</div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
  </div>
  <div class="register-ref">
    <a href="/registration">Sign up</a> <em> now</em>
  </div>
  <div class="form-check">
  		@if ($errors->any())
  			<strong>{{ $errors->first() }}</strong>
  		@endif
  </div>
  <input type="submit" class="btn btn-primary" value="Submit">
</form>
</div>