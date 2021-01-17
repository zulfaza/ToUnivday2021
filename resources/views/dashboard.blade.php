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
                    @if (false)
                        <a href="/saintek" class="btn block py-11 text-center text-white w-full text-4xl bg-pink-atas hover:bg-pink-400 transition mb-5">saintek</a>
                        <a href="/soshum" class="btn block py-11 text-center text-white w-full text-4xl bg-pink-atas hover:bg-pink-400 transition mb-5">soshum</a>
                    @else
                        
                        <div class="flex flex-col lg:flex-row items-start">
                            <div class="hasil mr-3 mb-4 w-full text-center p-5 rounded-xl bg-pink-atas ">
                                <h4 class="text-white text-xl font-bold " >Hasil</h4>
                                <hr class="my-2 border-2 border-white" >
                                <h2 class="text-8xl text-white" >85</h2>
                            </div>
                            <div>
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
                                <div class="collapse-wrapper w-full" id="collapse-wrapper">
                                    @for ($i = 1; $i < 40; $i++)
                                    <div class="collapse mb-3 bg-white rounded-lg shadow-md border-2 border-pink-atas px-5 py-2" id="collapse-{{$i}}">
                                        <div class="collapse-header flex justify-between items-center">
                                            <span class="bg-pink-atas px-5 py-1 rounded-md text-white text-3xl font-bold" >
                                                {{$i}}
                                            </span>
                                            <span class="text-green-500 font-bold text-3xl " >A</span>
                                            <span class="text-black font-bold text-3xl" >A</span>
                                            <button class="btn btn-blue" data-target="collapse-{{$i}}" id="btn-collapse-{{$i}}" data-parent="collapse-wrapper"  onclick="changeActiveTab(event)" >Detail</button>
                                        </div>
                                        <div class="collapse-detail h-0 overflow-hidden transition" id="detail-collapse-{{$i}}">
                                            <hr class="border-2 border-pink-atas my-3" >
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis ducimus blanditiis architecto eius. Inventore dolore tempora quis aperiam assumenda, nesciunt vel ipsum quia voluptates exercitationem. Voluptates ex provident dolore porro?</p>
                                            <p>jawaban : </p>
                                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
                                        </div>
                                    </div>
                                    @endfor
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