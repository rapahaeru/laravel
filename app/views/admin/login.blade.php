@extends('layouts.admin')

@section('content')

{{ Session::get('message') }}

<div class="row">
	<div class="col-md-6 col-md-offset-3">
		<div class="jumbotron">
			<h1>Login</h1>
			<!-- {{ Form::open( array('method' => 'post', 'url' => 'login/') ) }} -->
			{{ Form::open( array('method' => 'post', 'url' => 'login') ) }}
				<div class="form-group">
					<label for="email">User mail</label>
					<input type="text" class="form-control" id="email" name="email">
				</div>
				<div class="form-group">
					<label for="password">Pass</label>
					<input type="password" class="form-control" id="password" name="password">
				</div>
				<button class="btn btn-default">Entra</button>
			{{ Form::close() }}
		</div>	
	</div>
</div>
@stop