@section('judul', 'Buat Jenis | ')

<x-app-layout>
    <div class="container mt-10">
        <x-AdminNavbar />
        <h1 class="text-5xl mt-4">Buat Jenis</h1>
        <br>
        <a class="text-black hover:text-pink-atas transition" href="{{route('admin.jenis.list')}}" ><- Back</a>
        
        <div class="card-wrapper mt-5">
            
            <x-card header='Buat Jenis'>
                <form class="mt-4 text-xl"  action="{{route('admin.jenis.buat')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama Jenis</label>
                        <input type="text" class="form-control" name="nama" id="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="tipe">Pilih Tipe</label>
                        <select name="tipe" id="tipe" class="form-control" required>
                            <option class="uppercase" value="tps">TPS</option>
                            <option class="uppercase" value="saintek">saintek</option>
                            <option class="uppercase" value="soshum">soshum</option>
                        </select>
                    </div>
                    <button class="btn btn-blue">Buat</button>
                </form>
            </x-card>

        </div>

    </div>
</x-app-layout>