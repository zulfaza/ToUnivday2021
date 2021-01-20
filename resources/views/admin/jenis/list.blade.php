@section('judul', 'Jenis | ')

<x-app-layout>
    <div class="container mt-10">
        <x-AdminNavbar />
        <h1 class="text-5xl mt-4">Jenis</h1>
        <br>

        <x-auth-session-status class="mb-4 bg-green-300 px-6 py-4 rounded-lg" :status="session('sukses')" />

        <a href="{{route('admin.jenis.buat')}}" class="btn btn-pink">buat jenis</a>
        
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