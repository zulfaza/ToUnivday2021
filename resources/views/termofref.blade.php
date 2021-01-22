<x-app-layout>
    <div class="container px-6">
        <div class="lg:grid grid-rows-6 grid-cols-7 grid-flow-col gap-10 h-screen py-4">
            <div class="col-span-1 row-span-full">
                <x-navbar />
            </div>
            <div class="col-span-6 row-span-3">
                <x-auth-section />
                <div class="lg:grid grid-cols-7 gap-4 h-full">
                    <div class="col-span-4">
                        <div 
                        class="bg-pink-atas flex flex-col justify-end items-center h-min w-full relative rounded-2xl text-white text-center px-10 pt-4 font-bold"
                        >
                            <p class="text-lg relative">smansaunivday</p>
                            <img class="object-contain bottom-0 relative" src="{{asset('img/termOfRef/Saly-24.png')}}" alt="ilustrasi">
                        </div>
                    </div>
                    <div class="ml-4 col-span-3 flex items-end mt-5 lg:mt-0">
                        <div class="mb-10">
                            <h1 class="font-bold text-3xl md:text-4xl lg:text-6xl">term of reference</h1>
                            <p class="mt-5 mb-7 opacity-50">kurang lebih di page ini isinya 
                                panduan untuk kalian ngerjain
                                simulasi try out, jadi ya
                                kalo bisa mah diliat liat dulu sebelum
                                milih mau ngerjain yang mana</p>
                            @if ($sesi->start_time > now()->getPreciseTimestamp(3))
                            <div class="timer opacity-50 mr-5 text-4xl" id="countdown">
                                00:00
                            </div>
                            @else
                            <a class="btn btn-blue " href="{{route('user.pengerjaan.persiapan')}}">mulai</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-6 row-span-3 mb-10 lg:mb-0">
                <div class="lg:grid grid-cols-3 grid-rows-2 gap-4 w-full h-full py-10">
                    <x-term.poin 
                        img="{{asset('img/termOfRef/Activity.png')}}" 
                        title="poin satu" 
                        desc="Try out ini akan berisi dua segmen, yaitu TPS dan TPA"/>
                    <x-term.poin 
                        img="{{asset('img/termOfRef/Chart.png')}}" 
                        title="poin dua" 
                        desc="Total soal TPS dan TPA berisi masing masing 40 soal"/>
                    <x-term.poin 
                        img="{{asset('img/termOfRef/Time Square.png')}}" 
                        title="poin tiga" 
                        desc="Waktu yang disediakan, SAINTEK 118 menit SOSHUM 110 menit"/>
                    <x-term.poin 
                        img="{{asset('img/termOfRef/Calendar.png')}}" 
                        title="poin empat" 
                        desc="Akan dibagi menjadi dua sesi saat try out sedang berlangsung"/>
                    <x-term.poin 
                        img="{{asset('img/termOfRef/Path.png')}}" 
                        title="poin lima" 
                        desc="Bebas memilih jenis soal mana yang ingin dikerjakan, antara Saintek/Soshum"/>
                    <x-term.poin 
                        img="{{asset('img/termOfRef/Group 9.png')}}" 
                        title="poin enam" 
                        desc="Coba coba aja diseriusin pas ngerjainnya, siapa tau ada sesuatu, xixixi"/>
                </div>
            </div>
        </div>  
    </div>
    @if ($sesi->start_time > now()->getPreciseTimestamp(3))
    <script src="{{asset('js/timerInit.js')}}"></script>
    <script>
        let countdown = {{$sesi->start_time}}
        function reloadPage(){
            location.reload()
        }
        timerInit('countdown', countdown, reloadPage)
    </script>
    @endif
</x-app-layout>