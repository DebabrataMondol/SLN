<!-- Default Bootstrap Navbar -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">SLN</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="{{ Request::is('/') ? "active" : "" }}"><a href="/finalProject/">Home</a></li>
        <li class="{{ Request::is('blog') ? "active" : "" }}"><a href="/finalProject/blog">Question List</a></li>
        <li class="{{ Request::is('findStudents') ? "active" : "" }}"><a href="/finalProject/findStudents">Students List</a></li>
        <li class="{{ Request::is('findTeachers') ? "active" : "" }}"><a href="/finalProject/findTeachers">Teachers List</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        @if (Auth::check())


        <li><a>
            <img src="{{ url('/') }}/public/img/{{ Auth::user()->pic }}" width="30px" height="30px" class="img-circle" />
          </a>
        </li>
        <li class="dropdown">
          <a href="/" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Hello {{ ucwords(Auth::user()->name) }} <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('posts.index') }}">Posts</a></li>
            <li><a href="{{url('/profile')}}/{{ Auth::user()->slug }}">Profile</a></li>
            <li><a href="{{ route('tags.index') }}">Tags</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="{{ route('logout') }}">Logout</a></li>
          </ul>
        </li>
        
        @else
        
          <a href="{{ route('login') }}" class="btn btn-default">Login</a>
          <a href="{{ route('register') }}" class="btn btn-default">Register</a>

        @endif

      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>