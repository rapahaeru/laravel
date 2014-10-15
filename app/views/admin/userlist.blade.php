@extends('layouts.admin')

@section('content')


{{ Session::get('message') }}


<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Lista de usuários</div>
  <div class="panel-body">
    <p>Lista de todos os usuários cadastrados com acesso ao sistema.</p>
      <div class="" style="float:right">
      <button type="button" id="button-new" url="/admin/usuario/novo" class="btn btn-primary btn-lg"> Novo </button>
    </div>
  </div>

  <!-- Table -->
  <table class="table">
    <tr>
    	<th>Nome</th>
    	<th>E-mail</th>
    	<th>Painel</th>
    </tr>
    @if ( isset($userslist) )
      @foreach ($userslist as $key)
        <tr>
        	<td>{{ $key->usr_name }} {{ $key->usr_status == 0 ? '<small class="text-warning">inativo</small>' : '' }}</td>
        	<td>{{ $key->usr_mail }}</td>
        	<td>
            <button type="button" url="/admin/usuario/edit/{{ $key->usr_id }}" class="btn btn-info btn-sm button-edit">
              <span class="glyphicon glyphicon-edit"></span> 
            </button>
            <button type="button" url="/admin/usuario/remove/{{ $key->usr_id }}" class="btn btn-danger btn-sm button-remove">
              <span class="glyphicon glyphicon-remove"></span> 
            </button> 
          </td>
        </tr>
       @endforeach 
    @endif
  </table>
</div>
@stop
@section('script')
<script>
  $(document).ready(function (){

    buttonRedirect('#button-new');
    buttonRedirect('.button-edit');
    buttonRedirect('.button-remove');

  });
</script>
@stop