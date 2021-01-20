@section('judul', 'Buat Sesi | ')

<x-app-layout>
    <div class="container mt-10">
        <x-AdminNavbar />
        <h1 class="text-5xl mt-4">Edit Sesi</h1>
        <br>
        <a class="text-black hover:text-pink-atas transition" href="{{route('admin.listSesi')}}" ><- Back</a>
        
        <div class="card-wrapper mt-5">
            
            <x-card header='Edit Sesi'>
                <form class="mt-4 text-xl"  action="{{route('admin.EditSesi', $sesi->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Sesi</label>
                        <input type="text" required class="form-control" name="nama" value="{{$sesi->nama}}" id="nama">
                    </div>
                    <div class="form-group">
                        <label for="start_time">Waktu Mulai</label>
                        <input required value="{{\Carbon\Carbon::createFromTimestamp($sesi->start_time/1000)->format('Y-m-d\TH:i')}}" type="datetime-local" class="form-control" name="start_time" id="start_time">
                    </div>
                    <div class="form-group">
                        <label for="end_time">Waktu Selesai</label>
                        <input required value="{{\Carbon\Carbon::createFromTimestamp($sesi->end_time/1000)->format('Y-m-d\TH:i')}}" type="datetime-local" class="form-control" name="end_time" id="end_time">
                    </div>
                    <button class="btn btn-blue">Update</button>
                </form>
            </x-card>

        </div>

    </div>
</x-app-layout>