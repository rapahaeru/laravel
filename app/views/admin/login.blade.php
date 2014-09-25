@extends('layouts.admin')

@section('content')
<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="jumbotron">
			<h1>Login</h1>
			<form role="form" method="post">
				<div class="form-group">
					<label for="username">User</label>
					<input type="text" class="form-control" id="username" name="username">
				</div>
				<div class="form-group">
					<label for="password">Pass</label>
					<input type="password" class="form-control" id="password" name="password">
				</div>
				<button class="btn btn-default">Entra</button>
			</form>
		</div>	
	</div>
</div>
@stop