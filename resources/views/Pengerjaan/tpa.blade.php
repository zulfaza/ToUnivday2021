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
                    <p class="opacity-50 leading-relaxed">Waktu pengerjaan saintek <span class="font-bold" >48 menit</span> soshum <span class="font-bold" >40 menit</span></p>
                    <br />
                    <div class="font-bold opacity-50 text-7xl" id="countdown">
                        00 : 00
                    </div>
                    <div class="flex mt-3">
                        <a href="/mulai" class="btn btn-blue">Saintek</a>
                        <a href="/mulai" class="btn btn-blue">Soshum</a>
                    </div>
                </div>
                <img class="absolute bottom-3 right-3 z-0"  src="{{asset('img/TPA/Saly-16.png')}}" alt="ilustrasi">
            </div>
        </div>
    </div>
    <script>
        // Set the date we're counting down to
        var countDownDate = new Date("Jan 19, 2021 15:30:00").getTime();
        
        // Update the count down every 1 second
        var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = countDownDate - now;
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            if (seconds < 10) seconds = "0" + seconds;
            if (minutes < 10) minutes = "0" + minutes;
            document.getElementById("countdown").innerHTML = `${minutes} : ${seconds}`;
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("countdown").innerHTML = "EXPIRED";
            }
        }, 1000);
        </script>
</x-app-layout>