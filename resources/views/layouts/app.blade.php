<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Custon Login</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
  </head>

  <body>
    <nav class="navbar navbar-default" role="navigation">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button
            type="button"
            class="navbar-toggle"
            data-toggle="collapse"
            data-target=".navbar-ex1-collapse"
          >
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Aprendible</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">

          @if(session()->has('impersonator_id'))
          <form method="POST" action="{{ route('impersonations.destroy') }}" class="navbar-form pull-right">
            {{ csrf_field() }} {{ method_field('DELETE') }}
            <button type="submit" class="btn btn-danger">Dejar de personificar</button>
          </form>
          @endif

          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Inicio</a></li>
            @auth
            <li><a href="{{ route('admin.users.index') }}">Usuarios</a></li>
            <li><a href="#">{{ auth()->user()->name }}</a></li>
            @endauth
          </ul>
        </div>
      </div>
      <!-- /.navbar-collapse -->
    </nav>

    <div class="container">
      @if (session()->has('flash'))
      <div class="alert alert-info">{{ session("flash") }}</div>
      @endif @yield('content')
    </div>
  </body>
</html>
