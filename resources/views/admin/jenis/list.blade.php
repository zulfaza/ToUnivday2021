@section('judul', 'Jenis | ')

<x-app-layout>
    <div class="container mt-10">
        <x-AdminNavbar />
        <h1 class="text-5xl mt-4">Jenis</h1>
        <br>

        <x-auth-session-status class="mb-4 bg-green-300 px-6 py-4 rounded-lg" :status="session('sukses')" />
        <div class="flex w-full flex-col md:flex-row">
            <a href="{{route('admin.jenis.list')}}" class="btn btn-blue">All</a>
            <a href="{{route('admin.jenis.list', 'tps')}}" class="btn btn-blue">TPS</a>
            <a href="{{route('admin.jenis.list', 'saintek')}}" class="btn btn-blue">SAINTEK</a>
            <a href="{{route('admin.jenis.list', 'soshum')}}" class="btn btn-blue">SOSHUM</a>
        </div>
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

        <div class="card-wrapper mt-5">
            
            @if (count($listJenis) > 0)
                @foreach ($listJenis as $jenis)
                <x-card :header='$jenis->nama' class="mt-5 flex justify-between flex-col md:flex-row">
                    <div class="detail">
                        Tipe : <span class="uppercase font-bold" >{{$jenis->tipe}} </span>
                    </div>
                    <div class="btn-wrapper mt-5 md:mt-0">
                        <a href="{{route('admin.jenis.edit', $jenis->id)}}" class="btn btn-blue">Edit</a>
                        <a href="{{route('admin.jenis.hapus', $jenis->id)}}" class="btn btn-blue opacity-70">Hapus</a>
                    </div>
                </x-card>
                @endforeach
            @else
                Kosong
            @endif


        </div>

    </div>
</x-app-layout>