<div class="hidden lg:block mb-4">
    @if(Auth::guard('admin')->check())
    
    <div class="flex justify-end items-center">
        <div class="nama mr-3 ">
            <a class="text-xl text-black hover:text-pink-atas transition-colors" href="{{route('user.dashboard')}}">
                {{Auth::guard('admin')->user()->name}}
            </a>
        </div>
        <div class="profile">
            <a href="{{route('admin.dashboard')}}">
                <img src="{{asset('/img/Icon/profile.svg')}}" alt="avatar">
            </a>
        </div>
    </div>

    @elseif (Auth::check())

    <div class="flex justify-end items-center">
        <div class="nama mr-3 text-right ">
            <a class="text-xl text-black hover:text-pink-atas transition-colors" href="{{route('user.dashboard')}}">
                {{explode(' ', Auth::user()->name)[0]}}
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="text-sm opacity-75 text-black hover:text-pink-atas transition-colors" 
                    href="{{route('user.dashboard')}}"
                    onclick="event.preventDefault();
                    this.closest('form').submit();"
                    >
                    Logout
                </a>
            </form>
        </div>
        <div class="profile">
            <a href="{{route('user.dashboard')}}">
                <img src="{{asset('/img/Icon/profile.svg')}}" alt="avatar">
            </a>
        </div>
    </div>

    @else

    <div class="flex justify-end items-center">
        <a class="btn btn-pink" href="{{route('login')}}">
            Login
        </a>
    </div>
    @endif
</div>