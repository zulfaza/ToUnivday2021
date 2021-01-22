<x-app-layout>
    <div class="container px-6">
        <div class="lg:grid grid-rows-4 grid-cols-7 grid-flow-col gap-10 h-screen py-4">
            <div class="col-span-1 row-span-full">
                <x-navbar />
            </div>
            <div class="col-span-4 row-span-2 pb-10">
                <div class="relative h-full lg:pt-36">
                    <div class="bg-pink-atas rounded-xl h-full w-full">

                    </div>
                    <div class="flex flex-col-reverse lg:flex-row bg-pink-atas lg:bg-opacity-0 rounded-2xl lg:rounded-none relative lg:absolute bottom-0 pt-5 px-3 lg:py-0">
                        <img class="h-auto w-full lg:w-3/5" src="{{asset('img/Dashboard/Saly-19.png')}}" alt="ilustrasi">
                        <div class="hidden self-end lg:block mb-14 text-white">
                            <h2 class="font-bold text-xl sm:text-2xl" >selamat datang</h2>
                            <h3 class="mt-3 lg:text-base">di halaman depan try out 
                                smansaunivday 2021 !!!</h3>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-span-4 row-span-2">
                <div class="w-full h-full py-5 text-center lg:text-left">
                    <h1 class="font-bold text-3xl md:text-4xl lg:text-6xl mb-10" >smansaunivday</h1>
                    <p>univday tahun ini bakalan sedikit beda dibanding tahun tahun
                        sebelumnya. ya mau begimana lagi ? pandeminya masih ada,
                        tapi emang sih, di era disrupsi kek gini, kita semua tuh harus
                        bisa beradaptasi dengan cara berinovasi tentunya dalam
                        digitalisasi xixixi</p>
                        <br>
                    <a href="{{route('user.term')}}" class="btn btn-pink">
                    mulai
                    </a>
                </div>
            </div>
            <div class="col-span-2 row-span-full">

                <x-auth-section />
                <div class="h-full lg:h-3/4 w-full">
                    <x-pra-event />
                </div>
            </div>
        </div>  
    </div>
</x-app-layout>