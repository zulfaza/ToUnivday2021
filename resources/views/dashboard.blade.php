@section('judul', 'Dashboad | ')

<x-app-layout>
    <div class="container px-6">
        <div class="lg:grid grid-rows-4 grid-cols-7 grid-flow-col gap-10 h-screen py-4">
            
            <div class="col-span-1 row-span-full">
                <x-navbar />
            </div>

            <div class="col-span-4 row-span-full">
                <div class="relative h-full py-6">
                    <h1 class="font-bold text-center sm:text-left text-5xl sm:text-6xl mb-10" >Dashboard</h1>
                    @if (!$show)
                        <p>Belum ada nilai yang keluar, kayaknya kamu belum ngerjain deh. Ayo mulai kerjain</p>
                        <br>
                        <a class="btn btn-blue" href="{{route('user.term')}}">Mulai</a>
                    @else
                        
                        <div class="flex flex-col lg:flex-row items-start">
                            @isset($nilai)
                                <div class="hasil mr-3 mb-4 w-full lg:w-3/5 text-center p-5 rounded-xl bg-pink-atas ">
                                    <h4 class="text-white text-xl font-bold " >Hasil</h4>
                                    <hr class="my-2 border-2 border-white" >
                                    <h2 class="text-8xl text-white" >{{$nilai->value}}</h2>
                                </div>
                            @endisset
                            <div class="w-full">
                                <div class="w-full flex justify-between px-10">
                                    <span>
                                        no
                                    </span>
                                    <span>
                                        input
                                    </span>
                                    <span>jawaban</span>
                                    <span>detail</span>
                                </div>
                                <div class="collapse-wrapper w-full mb-12" id="collapse-wrapper">
                                    @foreach ($answers as $answer)
                                    <div class="collapse mb-3 bg-white rounded-lg shadow-md border-2 border-pink-atas px-5 py-2" id="collapse-{{$loop->iteration}}">
                                        <div class="collapse-header flex justify-between items-center">
                                            <span class="bg-pink-atas px-5 py-1 rounded-md text-white text-3xl font-bold" >
                                                {{$loop->iteration}}
                                            </span>
                                            <span class="{{$answer->value == $answer->soal->answer ? 'text-green-500' : 'text-red-500'}} font-bold text-3xl " >{{$answer->value ?? '-'}}</span>
                                            <span class="text-black font-bold text-3xl" >{{$answer->soal->answer}}</span>
                                            <button class="btn btn-blue" data-target="collapse-{{$loop->iteration}}" id="btn-collapse-{{$loop->iteration}}" data-parent="collapse-wrapper"  onclick="changeActiveTab(event)" >Detail</button>
                                        </div>
                                        <div class="collapse-detail h-0 overflow-hidden transition" id="detail-collapse-{{$loop->iteration}}">
                                            <hr class="border-2 border-pink-atas my-3" >
                                            {!!$answer->soal->body!!}
                                            @foreach ($answer->soal->options as $opsi)
                                                <ul class="mt-4">
                                                    <li class="mb-5 flex flex-row items-center">
                                                        <span class="{{$opsi->tipe == $answer->soal->answer ? 'bg-green-500' : ($opsi->tipe == $answer->value ? 'bg-red-500' : 'bg-pink-atas')}} rounded-lg px-3 py-2 mr-2" >
                                                            {{$opsi->tipe}}
                                                        </span> 
                                                        {!!$opsi->body!!}
                                                    </li>
                                                </ul>
                                            @endforeach
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>


                    @endif
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
    <script>
        function changeActiveTab(e) {
            const {parent, target} = e.target.dataset
            console.log(target);
            const listCollapse = document.getElementById(parent).children
            for(const collapse of listCollapse){
                if(collapse.id === target) continue;
                document.getElementById(`detail-${collapse.id}`).classList.add('h-0')
                document.getElementById(`detail-${collapse.id}`).classList.remove('h-full')
                document.getElementById(`btn-${collapse.id}`).textContent = 'detail'
                
            }
            const detailTarget = document.getElementById(`detail-${target}`)
            if(detailTarget.classList.contains("h-0")){
                detailTarget.classList.remove('h-0')
                detailTarget.classList.add("h-full")
                e.target.textContent = 'hide'
                return
            }
            detailTarget.classList.add('h-0')
            detailTarget.classList.remove('h-full')
            e.target.textContent = 'detail'
        }
    </script>

</x-app-layout>