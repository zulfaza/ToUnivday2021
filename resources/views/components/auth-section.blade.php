<div class="hidden lg:block mb-4">
    @auth('admin')
    <div class="flex justify-end items-center">
        <div class="nama mr-3 ">
            <a class="text-xl text-black hover:text-pink-atas transition-colors" href="{{route('dashboard')}}">
                Rifal
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
    @endauth
</div>