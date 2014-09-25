<!doctype html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Admin :: {{ Config::get('app.name') }}</title>
        <link href="{{asset('incs/css/bootstrap.min.css')}}" rel="stylesheet" />
        <style type="text/css">body{margin-top:80px;}</style>
        <?php /*
        <link href="{{asset('static/css/black-tie/jquery-ui-1.10.4.custom.min.css')}}" rel="stylesheet" />
        <link href="{{asset('static/css/colorbox.css')}}" rel="stylesheet" />
        <link href="{{asset('static/css/admin.css')}}" rel="stylesheet" />
        <script type="text/javascript">
            var BASE_PATH = "{{asset('')}}"
        </script>
        */ ?>
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
                </div>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <? /*@section('menu') 
                    <ul class="nav navbar-nav pull-left">
                        <!-- menus -->
                        <?php $menus = Config::get('menus.admin', []) ?>
                        @foreach($menus as $label => $content)
                            @if(is_array($content))
                                <li class="dropdown {{ menu_is_selected($content) }}">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> {{ $label }} </a>
                                    <ul class="dropdown-menu">
                                        @foreach($content as $label => $uri)
                                            <li class="{{ menu_is_selected([$uri]) }}"><a href="{{ url($uri) }}"> {{$label}} </a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            @else
                                <li class="{{ menu_is_selected([$content]) }}"><a href="{{ url($content) }}"> {{$label}} </a></li>
                            @endif
                        @endforeach
                    </ul>
                    @if(Auth::check())
                        <ul class="nav navbar-nav pull-right">
                            <!-- menus logado -->
                            <li><a href="{{ url('logout') }}">Sair</a></li>
                        </ul>
                    @endif
                    @show
                */ ?>
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
    </body>
</html>