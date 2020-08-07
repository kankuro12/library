<nav class="navbar navbar-expand-lg navbar-dark bg-info">
  <div class="container-fluid ">
    <a class="navbar-brand" href="/">Library</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        @if (Auth::check())
        <li class="nav-item">
          <a href="/" class="nav-link">Local Library</a>

        </li>
        <li class="nav-item">
          <a href="/public" class="nav-link">Public Library</a>
        </li>
        @if (App\Models\User::getRole(Auth::user()) == 'Superuser')
        <li class="nav-item"><a class="nav-link fa fa-wrench fa-lg" href="{{ route('indexBooks') }}"> Manage books</a>
        </li>
        <li class="nav-item"><a class="nav-link fa fa-wrench fa-lg" href="{{ route('indexCategories') }}"> Manage
            categories</a></li>
        <li class="nav-item"><a class="nav-link fa fa-book fa-lg" href="{{ route('indexBooks') }}"> Index books</a></li>
        <li class="nav-item"><a class="nav-link fa fa-wrench fa-lg" href="{{ route('indexReaders') }}"> Manage
            readers</a>
        </li>
        <li class="nav-item"><a class="nav-link fa fa-wrench fa-lg" href="{{ route('applications') }}">Applications</a>
        </li>
        @endif

      </ul>

      <ul class="navbar-nav">

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle fa fa-user-circle fa-lg" href="#" id="navbarDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Auth::user()->name }}
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('users.show', Auth::user()) }}">Personal info</a>
            <a class="dropdown-item" href="{{ route('users.edit', Auth::user()) }}">Update profile</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" id="logout" href="#">
              <form action="{{ route('logout') }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button class="btn btn-block btn-danger fa fa-sign-out" type="submit" name="button"> Logout</button>
              </form>
            </a>
          </div>
        </li>
        @else
        <li class="nav-item"><a class="nav-link fa fa-sign-in fa-lg" href="{{ route('login') }}"> Login</a></li>
        @endif
      </ul>
    </div>
  </div>
</nav>
