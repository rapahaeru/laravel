@extends('layouts.admin')


@section('content')
<div class="container main-content">
	<div class="jumbotron">
		<h1>Bem Vindo!</h1>
		<p>Aqui você pode gerenciar as informações do <?php echo Config::get('app.name') ?>. <br/> Para começar a editar é fácil, navegue pelos itens acima.</p>
	</div>	
</div>
@stop