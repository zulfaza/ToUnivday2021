@section('judul', 'Buat Paket | ')

<x-app-layout>
    <div class="container mt-10">
        <x-AdminNavbar />
        <h1 class="text-5xl mt-4">Buat Jenis</h1>
        <br>
        <a class="text-black hover:text-pink-atas transition" href="{{route('admin.jenis.list')}}" ><- Back</a>
        
        <div class="card-wrapper mt-5">
            
            <x-card header='Buat jenis'>
                <form class="mt-4 text-xl"  action="{{route('admin.jenis.edit', $jenis->id)}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Jenis</label>
                        <input type="text" class="form-control" value="{{$jenis->nama}}" name="nama" id="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="tipe">Pilih Tipe</label>
                        <select name="tipe" id="tipe" class="form-control" required>
                            <option class="uppercase" {{$jenis->tipe == 'tps' ? 'selected' : ''}} value="tps">TPS</option>
                            <option class="uppercase" {{$jenis->tipe == 'saintek' ? 'selected' : ''}} value="saintek">saintek</option>
                            <option class="uppercase" {{$jenis->tipe == 'soshum' ? 'selected' : ''}} value="soshum">soshum</option>
                        </select>
                    </div>
                    <button class="btn btn-blue">Update</button>
                </form>
            </x-card>

        </div>

    </div>
</x-app-layout>