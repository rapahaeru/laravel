    <!-- @if (isset($url_current) ) -->
    <!-- @endif -->

<? if (Session::has('user')) : ?>
  <ul class="nav nav-pills left" role="tablist">
    <li>
      <ul class="nav nav-pills">
        <li class="{{{ isset($url_current) && $url_current == 'admin' ? 'active' :'' }}}"><a href="{{ url('/admin') }}">Dash</a></li>
        <li class="{{{ isset($url_current) && $url_current == 'admin/midias' ? 'active' :'' }}}"><a href="{{ url('/admin/midias') }}">Mídias</a></li>
        <!-- <li><a href="#">Profile</a></li>
        <li><a href="#">Messages</a></li> -->
      </ul>      
    </li>
  </ul>

  <ul class="nav nav-pills right" role="tablist">
    <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#">
        Configurações <span class="caret"></span>
      </a>
      <ul class="dropdown-menu" role="menu">
          <li><a href="{{ url('/admin/usuarios') }}">Usuários</a></li>
          <li class="divider"></li>
          <li><a href="{{ url('/admin/logout') }}">Logout</a></li>
      </ul>
    </li>
  </ul>
<? endif ?>



