<ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link {{request()->is('Home/') ? 'active' : '' }}" href="/Home">Home
        <span class="sr-only">(current)</span>
      </a>
    </li>
    <li class="nav-item">
      <a href="/About" class="nav-link">About</a>
    </li>
    <li class="nav-item pl-5">
      <a href="/login" class="btn btn-primary">LOGIN</a>
    </li>
    <li class="nav-item pl-2">
      <a href="/register" class="btn btn-outline-info">REGISTER</a>
    </li>
</ul>