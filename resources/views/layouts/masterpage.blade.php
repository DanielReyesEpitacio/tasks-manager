<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('favicon.png')}}"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
<body>
    <header class="container-fluid p-3">
        <div class="container">
            <div class="row">
                <div class="col d-flex align-items-center">
                    <a href="{{route('home')}}" class="text-decoration-none"><h2 class="d-none d-md-inline">Sistema de gestión de tareas<h2></a>
                    <h3 class="d-inline d-md-none">SGT</h3>
                </div>
                <div class="col">
                <nav class="navbar navbar-expand-lg">
                  <div class="container-fluid">
                      <a class="navbar-brand" href="#"></a>
                      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                      </button>
                      <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto">
                          <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{route('home')}}">Inicio</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" aria-current="page" href="{{route('user.index')}}">Usuarios</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{route('task.index')}}">Tareas</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{route('roles.index')}}">Roles</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link"  aria-current="page" href="{{route('task-role.index')}}">Rol de tareas</a>
                          </li>
                          @auth
                          <li>
                            <form action="{{route('logout')}}" method="post">
                              @csrf
                              <input type="submit" value="Cerrar sesión" class="nav-link text-danger" />
                            </form>
                          </li>                    
                          @endauth
                        </ul> 
                      </div>
                  </div>
              </nav>
                </div>
            </div>
        </div>

    </header>
    <section class="container mt-3">
        @yield('main')
    </section>
    <footer></footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('script')

  </body>
</html>