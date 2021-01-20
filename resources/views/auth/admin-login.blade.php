@section('judul', 'Login  | ')

<x-guest-layout>
    <div class="fixed top-1 z-20">
        <a href="{{route('home')}}">
            <img src="{{asset('/img/Logo festum.png')}}" alt="logo festum">
        </a>
        <div class="w-md text-white w-56 ml-6 hidden sm:block">
            <p><span class="font-bold">Cobain dulu nih try out nya</span>
                buat tambah tambah 
                referensi soal </p>
        </div>
    </div>
    <div class="fixed bottom-10 font-medium text-white z-20 left-10 text-xl hidden sm:block">
        <p>dare it. dream it. drive it</p>
    </div>
    <div class="right-10 top-16 z-20 sm:opacity-50 fixed text-sm sm:text-xl text-white sm:text-black">
        <p class="font-medium">smansaunivday 2021</p>
    </div>
    <div class="fixed sm:hidden bottom-0 z-10">
        <img src="{{asset('/img/Login/Web Illustrations 1.png')}}" alt="ilustrasi">
    </div>
    <div class="bg-pink-gradient w-screen h-screen flex relative">
        <div class="sm:block hidden relative">
            <img class="object-cover h-screen w-max" src="{{asset('/img/Login/IlusDesktop.png')}}" alt="ilustrasi">
        </div>
        <div class="sm:bg-white px-11 py-12 w-full h-screen flex flex-col items-center justify-center z-10">
            <div class="w-full max-w-2xl">
                <h1 class="text-2xl sm:text-3xl font-bold mb-3 sm:text-black text-white">Login dulu ya... </h1>
                <div class="card p-5 sm:p-1 rounded-lg shadow-lg sm:shadow-none">
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form action="{{route('AdminLogin')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">email</label>
                            <input type="text" name="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control" id="password">
                        </div>
                        <div class="form-group">
                            <button class="bg-blue-300 hover:bg-blue-500 hover:rounded-lg transition-all duration-300 py-1 px-10 text-white">log in</button>
                        </div>
                        <!-- Remember Me -->
                        <div class="block mt-4">
                            <label for="remember_me" class="inline-flex items-center">
                                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>
                        <p class="opacity-50 text-xs sm:text-sm">*kerjakan soal ini dengan sungguh sungguh barangkali 
                            aja nanti keluar pas lagi ngerjain utbk </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
