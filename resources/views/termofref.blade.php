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
                            <a class="btn bg-blue rounded-full text-white hover:bg-blue-500 " href="/saintek">saintek</a>
                            <a class="btn bg-blue rounded-full text-white hover:bg-blue-500 " href="/soshum">soshum</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-6 row-span-3 mb-10 lg:mb-0">
                <div class="lg:grid grid-cols-3 grid-rows-2 gap-4 w-full h-full py-10">
                    <div class=" px-2 rounded-2xl text-black flex" >
                        <div class="lg:w-72 mr-7 lg:mr-0">
                            <img src="{{asset('img/termOfRef/Activity.png')}}" alt="icon">
                        </div>
                        <div class="self-center">
                            <h4 class="font-bold text-3xl mb-5">
                                poin satu
                            </h4>
                            <p class="opacity-50">Try out ini akan berisi
                                dua segmen, yaitu
                                TPS dan TPA</p>
                        </div>
                    </div>
                    <div class=" px-2 rounded-2xl text-black flex" >
                        <div class="lg:w-72 mr-7 lg:mr-0">
                            <img src="{{asset('img/termOfRef/Chart.png')}}" alt="icon">
                        </div>
                        <div class=" self-center">
                            <h4 class="font-bold text-3xl mb-5">
                                poin dua
                            </h4>
                            <p class="opacity-50">Total soal TPS dan TPA
                                berisi masing masing
                                40 soal</p>
                        </div>
                    </div>
                    <div class=" px-2 rounded-2xl text-black flex" >
                        <div class="lg:w-72 mr-7 lg:mr-0">
                            <img src="{{asset('img/termOfRef/Time Square.png')}}" alt="icon">
                        </div>
                        <div class=" self-center">
                            <h4 class="font-bold text-3xl mb-5">
                                poin tiga
                            </h4>
                            <p class="opacity-50">Waktu yang disediakan,
                                SAINTEK 118 menit
                                SOSHUM 110 menit</p>
                        </div>
                    </div>
                    <div class=" px-2 rounded-2xl text-black flex" >
                        <div class="lg:w-72 mr-7 lg:mr-0">
                            <img src="{{asset('img/termOfRef/Calendar.png')}}" alt="icon">
                        </div>
                        <div class=" self-center">
                            <h4 class="font-bold text-3xl mb-5">
                                poin empat
                            </h4>
                            <p class="opacity-50">Akan dibagi menjadi
                                dua sesi saat try out
                                sedang berlangsung</p>
                        </div>
                    </div>
                    <div class=" px-2 rounded-2xl text-black flex" >
                        <div class="lg:w-72 mr-7 lg:mr-0">
                            <img src="{{asset('img/termOfRef/Path.png')}}" alt="icon">
                        </div>
                        <div class=" self-center">
                            <h4 class="font-bold text-3xl mb-5">
                                poin lima
                            </h4>
                            <p class="opacity-50">Bebas memilih jenis
                                soal mana yang ingin
                                dikerjakan, antara
                                Saintek/Soshum</p>
                        </div>
                    </div>
                    <div class=" px-2 rounded-2xl text-black flex" >
                        <div class="lg:w-72 mr-7 lg:mr-0">
                            <img src="{{asset('img/termOfRef/Group 9.png')}}" alt="icon">
                        </div>
                        <div class=" self-center">
                            <h4 class="font-bold text-3xl mb-5">
                                poin enam
                            </h4>
                            <p class="opacity-50">Coba coba aja diseriusin
                                pas ngerjainnya, siapa
                                tau ada sesuatu, xixixi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</x-app-layout>