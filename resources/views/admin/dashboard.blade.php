@section('judul', 'Admin Dashboard |')
@section('css')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css">
@endsection
<x-app-layout>
    <div class="container mt-10">
        <x-AdminNavbar />
        <h1 class="text-5xl mt-4">Admin Dashboad</h1>
        @if ($isSuper)
        <form action="{{route('admin.updetOpenRegis')}}" method="POST">
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
                <label for="toggle" class="text-gray-700 ">Register Admin</label>
            </div>
        </form>
        @endif
    </div>
    <div class="container mt-6">
        <table id="table_id" class="display">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Email</th>
                    <th>Nama</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($listAdmin as $admin)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$admin->email}}</td>
                    <td>{{$admin->name}}</td>
                    <td>
                        {{$admin->isSuperAdmin == 1 ? 'Super Admin' : 'Biasa aja'}}
                    </td>
                    <td>
                       @if ($isSuper)
                       <a class="px-4 py-2 rounded-md btn-blue" href="{{route('admin.delete', $admin->id)}}">Hapus</a>                           
                       @endif
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