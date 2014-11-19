@extends('layouts.admin')


@section('content')

<ol class="breadcrumb">
  <li><a href="{{ url('admin/') }}">Home</a></li>
  <li class="active">Central de mídias</li>
</ol>

<div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">Central de mídias</div>
  <div class="panel-body">
    <p>Descrição</p>
      <div class="right">
      <button type="button" id="button-new" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#uploadImageModal"> Nova </button>
    </div>
  </div>
</div>  

<div class="nav-border">
  <ul class="nav nav-tabs">
    <li role="presentation" class="active"><a href="#">Mídias</a></li>
    <li role="presentation"><a href="#">Galerias</a></li>
  </ul>
</div>

@stop

<!-- Modal de upload -->
<div class="modal fade" id="uploadImageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Escolha uma ou mais imagens</h4>
      </div>
      <div class="modal-body">
        
          <div class="alert alert-danger" role="alert" style="display:none"></div>

          <div class="progress">
            <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 0%;">
              0%
            </div>
          </div>
          <form action="" enctype="multipart/form-data">
              <div class="form-group">
                <label for="inputImage">Imagem</label>
                <input type="file" if="inputImage" name="image[]" class="form-control" multiple>
              </div>
              <button type="submit" id="save" class="btn btn-success">Subir !</button>
          </form>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>

@section('script')
<script src="{{asset('incs/js/plugins/bootstrapValidator.min.js')}}"></script>
<script src="{{asset('incs/js/user/functions.js')}}"></script>
<? //endif;?>
<script>

  var form = document.querySelector('form');
  var request = new XMLHttpRequest();

  //progress
  request.upload.addEventListener('progress', function(e){
    var progress = e.loaded/e.total*100;
    console.log (progress + 'percent');
    $('.progress-bar').attr('style','width :' + progress + '%');
    $('.progress-bar').attr('aria-valuenow', progress);
    $('.progress-bar').html(progress + '%');
  },false);

  request.addEventListener('load', function(e){

    console.log (JSON.parse(e.target.responseText)); // retorno do ajax
    var dados = JSON.parse(e.target.responseText);
    console.log(dados.message);

    if (dados.success === false){
      $('.alert').html(dados.message);
      $('.alert').attr('style','display:block');
    }else{

      $('#uploadImageModal').modal('hide');

    }



  },false);

  form.addEventListener('submit', function(e){

    e.preventDefault();

    // multiple files will be in the form parameter

    var formdata = new FormData(form); // form element

    request.open('post','midias/upload'); // route laravel
    request.send(formdata);



  }, false);

  $(document).ready(function (){
      //submitType();


      $
  });
</script>
@stop