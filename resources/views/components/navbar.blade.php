<nav 
    class="navbar w-full">
    <div class="w-full">
        <div class="lg:flex justify-center mb-20 mt-5 hidden">
            <h5 class="text-white font-bold text-3xl border-b-4 border-white">
                dash
            </h5>
        </div>
        <ul class="flex flex-row justify-center lg:flex-col">
            <li class="nav-item {{Request::routeIs('home') ? 'active' :  '' }} ">
                <a href="{{route('home')}}">
                    <img src="{{asset('/img/Icon/home.svg')}}" alt="home">
                </a>
            </li>
            <li class="nav-item {{Request::routeIs('term') ? 'active' :  '' }}">
                <a href="{{route('term')}}">
                    <img src="{{asset('/img/Icon/menu.svg')}}" alt="home">
                </a>
            </li>
            <li class="nav-item">
                <a href="/">
                    <img src="{{asset('/img/Icon/edit.svg')}}" alt="home">
                </a>
            </li>
            <li class="nav-item">
                <a href="/">
                    <img src="{{asset('/img/Icon/other.svg')}}" alt="home">
                </a>
            </li>
            <li class="nav-item block lg:hidden">
                <a href="{{route('dashboard')}}">
                    <img src="{{asset('/img/Icon/profile white.svg')}}" alt="home">
                </a>
            </li>
        </ul>
    </div>
    <div class="hidden lg:block">
        <img src="{{asset('/img/Logo festum.png')}}" alt="">
    </div>
</nav>