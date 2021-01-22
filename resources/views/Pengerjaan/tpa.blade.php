<x-app-layout>

    <div class="container">
        <div class="lg:grid grid-rows-4 grid-cols-6 grid-flow-col gap-10 h-screen py-4">
            <div class="col-span-1 row-span-full">
                <x-navbar />
            </div>
            <div class="relative col-span-5 row-span-full h-full">
                <div class="lg:w-6/12 lg:py-10 px-5 z-10 relative h-full">
                    <h1 class="font-bold text-black text-5xl md:text-7xl leading-tight">
                        tes potensi akademik
                    </h1>
                    <p class="opacity-50 leading-relaxed">
                        Tes Potensi Akademik atau TPA merupakan tes
                        psikologi yang dapat mengungkap apa yang telah
                        dicapai seseorang secara intelektual. Karena
                        mengungkap kualitas intelektual, maka tinggi/rendah
                        nya nilai TPA sering dihubungkan dengan tinggi/rendah
                        nya tingkat kecerdasan</p>
                    <p class="opacity-50 leading-relaxed">Waktu pengerjaan 
                        @foreach ($listPaket as $paket)
                            {{$paket->tipe}} <span class="font-bold" >{{$paket->waktu}} menit</span>
                        @endforeach
                    </p>
                    <br />
                    <div class="font-bold opacity-50 text-7xl" id="countdown">
                        00 : 00
                    </div>
                    <div class="flex mt-3">
                        <form action="{{route('user.pengerjaan.doing')}}" method="GET">
                            @csrf
                            @foreach ($listPaket as $paket)
                                <button type="submit" name="pilihanTipe" value="{{$paket->tipe}}" class="btn btn-blue capitalize">{{$paket->tipe}}</button>    
                            @endforeach
                        </form>
                    </div>
                </div>
                <img class="absolute bottom-3 right-3 z-0"  src="{{asset('img/TPA/Saly-16.png')}}" alt="ilustrasi">
            </div>
        </div>
    </div>
    <script src="{{asset('js/timerInit.js')}}"></script>
    <script>
        // Set the date we're counting down to
        var countDownDate = {{$progress->stop_time}};
        function expiredFunction() {
            document.getElementById("countdown").innerHTML = "EXPIRED";
        }
        timerInit('countdown', countDownDate, expiredFunction)
        </script>
</x-app-layout>