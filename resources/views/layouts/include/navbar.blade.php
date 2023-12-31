<div class="sticky-top">
    

<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">BlogApp</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link @if(empty(Request::segment(2))) active @endif" href="{{ url('/')}}" aria-current="page">Home</a>
                </li>   

            </ul>
            <div>
                @if(Auth::check() && Auth::user())
                    <a href="{{ url('tasks/index') }}" class="m-4 text-decoration-none text-dark">Go to Dashboard</a>
                @endif
                </div>
            @if (Route::has('login'))
                <div class="nav-item">
                    @auth
                    <a class="text-decoration-none btn" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    
                    @else
                        <a href="{{ route('login') }}" class="text-decoration-none btn">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-decoration-none btn">Register</a>
                        @endif
                    @endauth
                </div>
             @endif
        </div>
  </div>
</nav>
</div>

<div class="intro">
    <img class="homeimg img-fluid" src="{{ asset('assets/images/task-management-process.png') }}" alt=""/>
    <div class="head text-center">
        <h1>Task Manager</h1>
        <h5>Schedule your task</h5>
        <p>Here you wiil be create task list and handle the task.</p>
    </div>
</div>