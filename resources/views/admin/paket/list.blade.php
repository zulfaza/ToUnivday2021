@section('judul', 'Paket | ')

<x-app-layout>
    <div class="container mt-10">
        <x-AdminNavbar />
        <h1 class="text-5xl mt-4">Paket</h1>
        <br>

        <x-auth-session-status class="mb-4 bg-green-300 px-6 py-4 rounded-lg" :status="session('sukses')" />

        <a href="{{route('admin.paket.buat')}}" class="btn btn-pink">buat paket</a>
        
        <div class="card-wrapper mt-5">
            
            @if (count($listPaket) > 0)
                @foreach ($listPaket as $paket)
                <x-card :header='$paket->name' class="mt-5 flex justify-between flex-col md:flex-row">
                    <div class="detail">
                        Sesi : {{$paket->sesi->nama}} | Waktu : {{$paket->waktu}} menit
                    </div>
                    <div class="btn-wrapper mt-5 md:mt-0">
                        <a href="{{route('admin.paket.edit', $paket->id)}}" class="btn btn-blue">Tambah & edit soal</a>
                        <a href="{{route('admin.paket.edit', $paket->id)}}" class="btn btn-blue">Edit</a>
                        <a href="{{route('admin.paket.hapus', $paket->id)}}" class="btn btn-blue opacity-70">Hapus</a>
                    </div>
                </x-card>
                @endforeach
            @else
                Kosong
            @endif


        </div>

    </div>
</x-app-layout>