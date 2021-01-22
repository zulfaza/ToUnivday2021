<x-app-layout>

    <div class="container">
        <div class="lg:grid grid-rows-4 grid-cols-6 grid-flow-col gap-10 h-screen py-4">
            <div class="col-span-1 row-span-full">
                <x-navbar />
            </div>
            <div class="relative col-span-5 row-span-full h-full">
                <div class="lg:w-6/12 lg:py-10 px-5 z-10 relative h-full">
                    <h1 class="font-bold text-black text-5xl md:text-7xl leading-tight">
                        tes potensi skolatis
                    </h1>
                    <p class="opacity-50 leading-relaxed">
                        Tes Potensi Skolastik (TPS) adalah sebuah tes
                        yang bertujuan untuk menguji kemampuan
                        dasar peserta UTBK dalam logika, analisis,
                        dan lainnya yang meliputi: Penalaran Umum.
                        Pemahaman Bacaan dan Menulis. Pengetahuan
                        dan Pemahaman Umum.</p>
                    <p class="opacity-50 leading-relaxed">Waktu pengerjaan : <span class="font-bold" >{{$paket->waktu}} menit</span></p>
                    <br />
                    <a href="{{route('user.pengerjaan.doing')}}" class="btn btn-blue">mulai</a>
                </div>
                <img class="absolute bottom-3 right-3 z-0"  src="{{asset('img/TPS/Saly-10.png')}}" alt="ilustrasi">
            </div>
        </div>
    </div>

</x-app-layout>