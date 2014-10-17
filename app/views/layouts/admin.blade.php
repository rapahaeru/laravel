<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Admin :: {{ Config::get('app.name') }}</title>
        <link href="{{asset('incs/css/bootstrap.min.css')}}" rel="stylesheet" />
        <link href="{{asset('incs/css/plugins/bootstrapValidator.min.css')}}" rel="stylesheet" />
        <link href="{{asset('incs/css/style.css')}}" rel="stylesheet" />

        <style type="text/css">body{margin-top:130px;}</style>
    </head>
    <body>
        
        <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                      <span class="sr-only">Toggle Navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand active" href="{{url('admin')}}">{{ Config::get('app.name') }}</a>
                    <a href="/admin/logout">Logout</a>
                </div>
                
                <div class="collapse navbar-collapse navbar-ex1-collapse menu-style">
                    @include('admin.menu')
                    <?php //var_dump(Config::get('2id_dados.data')) ?>
                </div>
            </div>
        </div>

        <div class="container" id="main-container">
          @yield("content")
        </div> <!-- /container -->

        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="{{asset('incs/js/jQuery-1.111.min.js')}}"></script>
        <script src="{{asset('incs/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('incs/js/functions.js')}}"></script>
        @yield("script")
    </body>
</html>