<x-app-layout>
    <div class="container px-6">
        <div class="lg:grid grid-rows-4 grid-cols-7 grid-flow-col gap-10 h-screen py-4">
            <div class="col-span-1 row-span-full">
                <nav 
                    class="navbar w-11/12">
                    <div class="w-full">
                        <div class="lg:flex justify-center mb-20 mt-5 hidden">
                            <h5 class="text-white font-bold text-3xl border-b-4 border-white">
                                dash
                            </h5>
                        </div>
                        <ul class="flex flex-row justify-center lg:flex-col">
                            <li class="nav-item">
                                <a href="/">
                                    <img src="{{asset('/img/Icon/home.svg')}}" alt="home">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/">
                                    <img src="{{asset('/img/Icon/menu.svg')}}" alt="home">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/">
                                    <img src="{{asset('/img/Icon/edit.svg')}}" alt="home">
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/">
                                    <img src="{{asset('/img/Icon/other.svg')}}" alt="home">
                                </a>
                            </li>
                            <li class="nav-item block lg:hidden">
                                <a href="{{route('dashboard')}}">
                                    <img src="{{asset('/img/Icon/profile white.svg')}}" alt="home">
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="hidden lg:block">
                        <img src="{{asset('/img/Logo festum.png')}}" alt="">
                    </div>
                </nav>
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
                    <button class="px-6 py-2 transition-colors bg-pink-atas hover:bg-opacity-100 bg-opacity-0 duration-300 border-4 border-pink-atas rounded-xl hover:text-white font-bold">
                        home
                    </button>
                </div>
            </div>
            <div class="col-span-2 row-span-full">

                <div class="hidden lg:block mb-4">
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

                <div class="h-full lg:h-3/4 w-full">
                    <div 
                    class="bg-pink-atas font-bold text-white text-center h-full w-full rounded-2xl px-6 py-8 flex flex-col items-center bg-bottom bg-no-repeat pb-72 lg:pb-0" 
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