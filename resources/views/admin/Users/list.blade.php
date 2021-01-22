@section('judul', 'List Users | ')

@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
@endsection

<x-app-layout>
    
    <div class="container mt-10">
        <x-AdminNavbar />
        <h1 class="text-5xl mt-4">Users</h1>
        <form action="{{route('admin.users.updateOpenRegis')}}" method="POST">
            @csrf
            <div class="flex items-center">
                <div class="relative inline-block w-10 align-middle select-none transition duration-200 ease-in mr-3">
                    <input {{$OpenRegis ? 'checked' : ''}} 
                            type="checkbox" 
                            name="toggle" 
                            id="toggle" 
                            class="toggle-checkbox absolute block w-6 h-6 rounded-full bg-white border-4 appearance-none cursor-pointer"
                            onclick="this.closest('form').submit();"
                            />
                    <label for="toggle" class="toggle-label block overflow-hidden h-6 rounded-full bg-gray-300 cursor-pointer"></label>
                </div>
                <label for="toggle" class="text-gray-700 ">Register</label>
            </div>
        </form>
    </div>
    <div class="container mt-5">
        <table id="table_id" class="display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->kelas}}</td>
                    <td>
                        @switch($user->status)
                            @case(0)
                                Belum Login
                                @break
                            @case(1)
                                Udah Login
                                @break
                            @case(2)
                                Udah TPS
                                @break
                            @case(3)
                                Selesai
                                @break
                            @default
                        @endswitch
                    </td>
                    <td>
                        <a class="px-4 py-2 rounded-md btn-blue" href="{{route('admin.users.detail', $user->id)}}">Detail</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"
    ></script>;
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>
    <script>
         $('#table_id').DataTable();
    </script>
</x-app-layout>