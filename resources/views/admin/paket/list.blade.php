@section('judul', 'Sesi')

<x-app-layout>
    <div class="container mt-10">
        <x-AdminNavbar />
        <h1 class="text-5xl mt-4">Paket</h1>
        <br>

        <x-auth-session-status class="mb-4 bg-green-300 px-6 py-4 rounded-lg" :status="session('sukses')" />

        <a href="{{route('admin.sesi.buat')}}" class="btn btn-pink">buat paket</a>
        
        <div class="card-wrapper mt-5">
            
            @if (count($listPaket) > 0)
                @foreach ($listPaket as $paket)
                <x-card :header='$sesi->nama' class="mt-5 flex justify-between flex-col md:flex-row">
                    <div class="detail">
                        Start : {{\Carbon\Carbon::createFromTimestamp($sesi->start_time/1000)->format('H:i a j M Y') }} | End : {{\Carbon\Carbon::createFromTimestamp($sesi->end_time/1000)->format('H:i a j M Y') }}
                    </div>
                    <div class="btn-wrapper mt-5 md:mt-0">
                        <a href="{{route('admin.sesi.edit', $sesi->id)}}" class="btn btn-blue">Edit</a>
                        <a href="{{route('admin.sesi.hapus', $sesi->id)}}" class="btn btn-blue opacity-70">Hapus</a>
                    </div>
                </x-card>
                @endforeach
            @else
                Kosong
            @endif


        </div>

    </div>
</x-app-layout>