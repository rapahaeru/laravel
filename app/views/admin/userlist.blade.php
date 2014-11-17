@extends('layouts.admin')

@section('content')


{{ Session::get('message') }}

<ol class="breadcrumb">
  <li><a href="{{ url('admin/') }}">Home</a></li>
  <li class="active">Lista de usuários</li>
</ol>

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
            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#confirmModal">
              <span class="glyphicon glyphicon-remove"></span> 
            </button> 
          </td>
        </tr>
       @endforeach 
    @endif
  </table>

   {{ $userslist->links() }}

<!-- Modal de confirmação -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Confirmação</h4>
      </div>
      <div class="modal-body">
        <strong>Você tem certeza ?</strong>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
        <button type="button" url="/admin/usuario/remove/{{ $key->usr_id }}" class="btn btn-primary button-remove" data-dismiss="modal">Sim, tenho certeza</button>
      </div>
    </div>
  </div>
</div>

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