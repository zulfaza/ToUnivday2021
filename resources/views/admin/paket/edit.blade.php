@section('judul', 'Buat Paket | ')

<x-app-layout>
    <div class="container mt-10">
        <x-AdminNavbar />
        <h1 class="text-5xl mt-4">Buat Sesi</h1>
        <br>
        <a class="text-black hover:text-pink-atas transition" href="{{route('admin.paket.list')}}" ><- Back</a>
        
        <div class="card-wrapper mt-5">
            
            <x-card header='Buat Paket'>
                <form class="mt-4 text-xl"  action="{{route('admin.paket.edit', $paket->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Paket</label>
                        <input type="text" class="form-control" value="{{$paket->name}}" name="nama" id="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="tipe">Pilih Tipe</label>
                        <select name="tipe" id="tipe" class="form-control" required>
                            <option class="uppercase" {{$paket->tipe == 'tps' ? 'selected' : ''}} value="tps">TPS</option>
                            <option class="uppercase" {{$paket->tipe == 'saintek' ? 'selected' : ''}} value="saintek">saintek</option>
                            <option class="uppercase" {{$paket->tipe == 'soshum' ? 'selected' : ''}} value="soshum">soshum</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sesi">Pilih Sesi</label>
                        <select name="sesi" id="sesi" class="form-control" required>
                            @foreach ($listSesi as $sesi)
                                <option {{$paket->sesi_id == $sesi->id ? 'selected' : ''}} value="{{$sesi->id}}">{{$sesi->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="waktu">Waktu (menit)</label>
                        <input type="number" class="form-control" name="waktu" id="waktu" min="0" value="{{$paket->waktu}}" required>
                    </div>
                    <button class="btn btn-blue">Buat</button>
                </form>
            </x-card>

        </div>

    </div>
</x-app-layout>