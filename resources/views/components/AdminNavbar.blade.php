<nav 
    class="bg-pink-atas px-5 py-3 rounded-lg w-full flex justify-between flex-row">
    <ul class="flex">
        <li class="mr-3">
            <a class="text-white" href="{{route('admin.sesi.list')}}">Sesi</a>
        </li>
        <li class="mr-3">
            <a class="text-white" href="{{route('admin.paket.list')}}">Paket</a>
        </li>
        <li class="mr-3">
            <a class="text-white" href="{{route('admin.users')}}">Users</a>
        </li>
        <li class="mr-3">
            <a class="text-white" href="{{route('admin.jenis.list')}}">Jenis</a>
        </li>
    </ul>
    <div>
        <form method="POST" action="{{ route('AdminLogout') }}">
            @csrf
            <a class="text-white font-bold hover:text-black" href="{{route('AdminLogout')}}" onclick="event.preventDefault();
            this.closest('form').submit();">{{_('Logout')}}</a>
        </form>
    </div>
</nav>