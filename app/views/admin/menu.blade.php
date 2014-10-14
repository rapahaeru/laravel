    <!-- {{ $url_current }} -->
  <ul class="nav nav-tabs" role="tablist">
    <li>
      <ul class="nav nav-pills">
        <li class="active"><a href="#">Dash</a></li>
        <li><a href="#">Profile</a></li>
        <li><a href="#">Messages</a></li>
      </ul>      
    </li>
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        Configurações <span class="caret"></span>
      </a>
      <ul class="dropdown-menu" role="menu">
          <li><a href="{{ url('/admin/usuarios') }}">usuários</a></li>
      </ul>
    </li>

  </ul>



