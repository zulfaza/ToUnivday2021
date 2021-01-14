<x-app-layout>
    <div class="container">
        <div class="grid grid-rows-4 grid-cols-7 grid-flow-col gap-10 h-screen py-4">
            <div class="col-span-1 row-span-full">
                <nav class="bg-pink-atas px-3 py-4 rounded-2xl h-full flex items-center justify-between flex-col">
                    <div>
                        <div class="flex justify-center mb-20 mt-5">
                            <h5 class="text-white font-bold text-3xl border-b-4 border-white">
                                dash
                            </h5>
                        </div>
                        <ul>
                            <li class="p-3 rounded-xl flex justify-center items-center mb-2 hover:bg-white hover:bg-opacity-30 transition">
                                <a href="/">
                                    <img src="{{asset('/img/Icon/home.svg')}}" alt="home">
                                </a>
                            </li>
                            <li class="p-3 rounded-xl flex justify-center items-center mb-2 hover:bg-white hover:bg-opacity-30 transition">
                                <a href="/">
                                    <img src="{{asset('/img/Icon/menu.svg')}}" alt="home">
                                </a>
                            </li>
                            <li class="p-3 rounded-xl flex justify-center items-center mb-2 hover:bg-white hover:bg-opacity-30 transition">
                                <a href="/">
                                    <img src="{{asset('/img/Icon/edit.svg')}}" alt="home">
                                </a>
                            </li>
                            <li class="p-3 rounded-xl flex justify-center items-center mb-2 hover:bg-white hover:bg-opacity-30 transition">
                                <a href="/">
                                    <img src="{{asset('/img/Icon/other.svg')}}" alt="home">
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <img src="{{asset('/img/Logo festum.png')}}" alt="">
                    </div>
                </nav>
            </div>
            <div class="col-span-4 row-span-2 pb-10">
                <div class="relative h-full pt-36">
                    <div class="bg-pink-atas rounded-xl h-full w-full">

                    </div>
                    <div class="flex flex-row absolute bottom-0">
                        <img class="h-full max-h-96 w-auto" src="{{asset('img/Dashboard/Saly-19.png')}}" alt="ilustrasi">
                        <div class="self-end mb-24 text-white">
                            <h2 class="font-bold text-4xl" >selamat datang</h2>
                            <h3 class="mt-3 text-xl">di halaman depan try out 
                                smansaunivday 2021 !!!</h3>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-span-4 row-span-2">
                <div class="w-full h-full py-5">
                    <h1 class="font-bold text-6xl mb-10" >smansaunivday</h1>
                    <p>univday tahun ini bakalan sedikit beda dibanding tahun tahun
                        sebelumnya. ya mau begimana lagi ? pandeminya masih ada,
                        tapi emang sih, di era disrupsi kek gini, kita semua tuh harus
                        bisa beradaptasi dengan cara berinovasi tentunya dalam
                        digitalisasi xixixi</p>
                        <br>
                    <button class="px-6 py-2 transition-colors bg-pink-atas hover:bg-opacity-100 bg-opacity-0 duration-300 border-4 border-pink-atas rounded-xl hover:text-white font-bold">
                        home
                    </button>
                </div>
            </div>
            <div class="col-span-2 row-span-full">

                <div class="my-4">
                    <div class="flex justify-end items-center">
                        <div class="nama mr-3 ">
                            <a class="text-xl text-black hover:text-pink-atas transition-colors" href="{{route('dashboard')}}">
                                Rifal
                            </a>
                        </div>
                        <div class="profile">
                            <a href="{{route('dashboard')}}">
                                <img src="{{asset('/img/Icon/profile.svg')}}" alt="avatar">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="h-3/4 w-full">
                    <div 
                    class="bg-pink-atas font-bold text-white text-center h-full w-full rounded-2xl px-6 py-8 flex flex-col items-center bg-bottom bg-no-repeat" 
                    style="background-image: url('/img/Dashboard/Intersect.png');"
                    >
                        <div class="bg-blue py-2 px-4 text-white text-2xl shadow-md w-max rounded-xl">
                            pra event
                        </div>
                        <p class="mt-5">
                            jadi untuk pra event yang pertama itu bakalan ada
                            simulasi try out
                            yang barangkali
                            bisa jadi referensi
                            buat kalian nantinya
                            </p>
                        <p class="mt-6">sekaligus juga bisa 
                            ngelatih kemampuan
                            kalian</p>
                        
                        <p class="mt-10">Sponsored by</p>
                        <a class="mt-5" href="https://www.instagram.com/ascending.pro/" target="_blank" rel="noopener noreferrer">
                            <img src="{{asset('img/Dashboard/Logo-18 1.png')}}" alt="ascending production">
                        </a>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</x-app-layout>