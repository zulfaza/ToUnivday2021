<div class="hidden lg:block mb-4">
    @if(Auth::guard('admin')->check())
    
    <div class="flex justify-end items-center">
        <div class="nama mr-3 ">
            <a class="text-xl text-black hover:text-pink-atas transition-colors" href="{{route('dashboard')}}">
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
        <div class="nama mr-3 ">
            <a class="text-xl text-black hover:text-pink-atas transition-colors" href="{{route('dashboard')}}">
                {{Auth::user()->name}}
            </a>
        </div>
        <div class="profile">
            <a href="{{route('dashboard')}}">
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