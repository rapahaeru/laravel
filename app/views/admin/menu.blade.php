    <!-- @if (isset($url_current) ) -->
    <!-- @endif -->

<? if (Session::has('user')) : ?>
  <ul class="nav nav-tabs left" role="tablist">
    <li>
      <ul class="nav nav-pills">
        <li class="active"><a href="#">Dash</a></li>
        <!-- <li><a href="#">Profile</a></li>
        <li><a href="#">Messages</a></li> -->
      </ul>      
    </li>
  </ul>

  <ul class="nav nav-tabs right" role="tablist">
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        Configurações <span class="caret"></span>
      </a>
      <ul class="dropdown-menu" role="menu">
          <li><a href="{{ url('/admin/usuarios') }}">Usuários</a></li>
          <li class="divider"></li>
          <li><a href="/admin/logout">Logout</a></li>
      </ul>
    </li>
  </ul>
<? endif ?>



