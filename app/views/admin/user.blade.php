@extends('layouts.admin')

@section('content')
@if ( isset($userData) )
  {{ Form::open( array('method' => 'post', 'name' => 'form-user' , 'url' => 'admin/usuario/atualiza/' . $userData['0']->usr_id) ) }}
@else
  {{ Form::open( array('method' => 'post', 'name' => 'form-user' , 'url' => 'admin/usuario/novo') ) }}
@endif

  <div class="form-group">
    <label for="inputmail">E-mail</label>
    <input type="email" class="form-control" id="inputmail" name="inputmail" placeholder="Digite seu e-mail" value="{{{ isset($userData['0']->usr_mail) && $userData['0']->usr_mail != "" ? $userData['0']->usr_mail : ""  }}}">
  </div>
  <div class="form-group">
    <label for="inputname">Nome</label>
    <input type="text" class="form-control" id="inputname" name="inputname" placeholder="Digite seu nome completo" value="{{{ isset($userData['0']->usr_name) && $userData['0']->usr_name != "" ? $userData['0']->usr_name : ""  }}}">
  </div>  
  <div class="form-group">
    <label for="inputpass">Senha</label>
    <input type="password" class="form-control" id="inputpass" name="inputpass" placeholder="Senha">
  </div>
  <div class="form-group">
    <label for="inputconfirmpass">Redigite senha</label>
    <input type="password" class="form-control" id="inputconfirmpass" name="inputconfirmpass" placeholder="Confirme senha">
  </div>  
  <input type="hidden" name="submit-type" id="submit-type" value="">
  <? if (strpos($url_current,'edit')) : ?>
    <input type="hidden" id="template-form" name="template" value="edit">
    <input type="hidden" id="current-mail" name="current-mail" value="{{{ isset($userData['0']->usr_mail) && $userData['0']->usr_mail != "" ? $userData['0']->usr_mail : ""  }}}">
  <? else : ?> 
    <input type="hidden" id="template-form" name="template" value="insert">
    <input type="hidden" id="current-mail" name="current-mail" value="">
  <? endif;?>
  <button type="submit" id="save" class="btn btn-success">Salvar</button>
  <button type="submit" id="save-inactive" class="btn btn-danger">Salvar inativo</button>
  {{ Form::close() }}

@stop
@section('script')
<script src="{{asset('incs/js/plugins/bootstrapValidator.min.js')}}"></script>
<script src="{{asset('incs/js/user/functions.js')}}"></script>
<? //endif;?>
<script>
  $(document).ready(function (){
      submitType();
  });
</script>
@stop