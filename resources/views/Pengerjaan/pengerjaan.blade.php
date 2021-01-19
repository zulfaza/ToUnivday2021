@section('judul', 'Dashboad | ')

<x-app-layout>
    <div class="container px-6">
        <div class="lg:grid grid-rows-4 grid-cols-7 grid-flow-col gap-10 h-screen py-4">
            
            <div class="col-span-1 row-span-full">
                <x-navbar />
            </div>

            <div class="col-span-6 row-span-full">
                <x-auth-section />
                <div class="relative h-full py-6">
                    <form action="">
                    <div class="flex font-bold justify-between flex-row items-center">
                        <div class="bg-white border-4 border-pink-atas px-3 py-1  rounded-2xl">
                            soal no 1
                        </div>
                        <div class="timer opacity-50 mr-5 text-4xl" id="countdown">
                            00:00
                        </div>
                    </div>
                    <div class="grid grid-cols-6 mt-4">
                        <div class="soal col-span-5">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                                Eum quo fugit quas quam officiis consequuntur ut commodi molestias consectetur aperiam,
                                autem dicta dolores accusantium dolor, quae cumque omnis quidem quasi.
                            </p>
                            <ul>
                                <li>
                                    a. ini opsi a
                                </li>
                                <li>
                                    b. ini opsi b
                                </li>
                                <li>
                                    c. ini opsi c
                                </li>
                                <li>
                                    d. ini opsi d
                                </li>
                            </ul>
                            <div class="flex mt-4">
                                <button class="bg-pink-atas rounded-full text-white py-1 px-6 mr-3 hover:bg-pink-400 transition-colors" >
                                    prev
                                </button>
                                <button class="bg-pink-atas rounded-full text-white py-1 px-6 hover:bg-pink-400 transition-colors" >
                                    next
                                </button>
                            </div>
                        </div>
                        <div class="col-span-1 flex justify-center items-center flex-col">
                            <div class="no flex-wrap flex justify-evenly">
                                @for ($i = 1; $i < 11; $i++)
                                <button class="bg-white mb-3 hover:bg-pink-atas border-4 border-pink-atas rounded-2xl px-4 py-1">
                                    {{$i}}
                                </button>
                                @endfor
                            </div>
                            <button class="px-6 py-1 btn-blue">selesai</button>
                        </div>
                    </div>
                </div>
            </form>
            </div>
        </div>  
    </div>
    <script>
        // Set the date we're counting down to
        var countDownDate = new Date("Jan 17, 2021 15:00:00").getTime();
        
        // Update the count down every 1 second
        var x = setInterval(function() {
        
          // Get today's date and time
          var now = new Date().getTime();
        
          // Find the distance between now and the count down date
          var distance = countDownDate - now;
        
          // Time calculations for days, hours, minutes and seconds
        //   var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        //   var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
          var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
          var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        
          // Display the result in the element with id="demo"
          document.getElementById("countdown").innerHTML = `${minutes} : ${seconds}`;
        
          // If the count down is finished, write some text
          if (distance < 0) {
            clearInterval(x);
            document.getElementById("countdown").innerHTML = "EXPIRED";
          }
        }, 1000);
        </script>
</x-app-layout> 