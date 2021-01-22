@section('judul', 'Dashboad | ')



<x-app-layout>
    
    <style>
/* The opsi */
.opsi {
    display: block;
    position: relative;
    padding-left: 37px;
    margin-bottom: 12px;
    cursor: pointer;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
  }

  /* Hide the browser's default radio button */
  .opsi input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
  }

  /* Create a custom radio button */
  .checkmark {
    position: absolute;
    top: 0;
    left: 0;
    background-color: #eee;
    border: 2px solid #2196F3;
    padding: 0 7px;
    border-radius: 50%;
    margin-right: 10px;
    }

  /* On mouse-over, add a grey background color */
  .opsi:hover input ~ .checkmark {
    background-color: #ccc;
  }
  .opsi input:checked ~ .checkmark {
    background-color: #2196F3;
  }

  /* Create the indicator (the dot/circle - hidden when not checked) */
  .checkmark:after {
    content: "";
    position: absolute;
    display: none;
  }

    </style>

    
    <div class="container px-6">
        <div class="lg:grid grid-rows-4 grid-cols-7 grid-flow-col gap-10 h-screen py-4">
            
            <div class="col-span-1 row-span-full">
                <x-navbar />
            </div>

            <div class="col-span-6 row-span-full">
                <x-auth-section />
                <div class="relative h-full py-6">
                    <form id="formSoal" action="{{route('user.pengerjaan.doing')}}" method="POST">
                    <div class="flex font-bold justify-between flex-col md:flex-row items-center">
                        <div class="flex items-center mb-5 md:mb-0">
                            <div class="bg-white border-4 border-pink-atas px-3 py-1  rounded-2xl mr-3">
                                soal no {{$no}}
                            </div>
                            <span class="opacity-50 capitalize" >{{$currentSoal->jenis->nama}}</span>
                        </div>

                        <div class="timer opacity-50 mr-5 text-4xl" id="countdown">
                            00:00
                        </div>
                    </div>
                    <div class="md:grid grid-cols-6 mt-4">
                            @csrf
                            <input type="hidden" name="currentNumber" value="{{$no}}">
                            <input type="hidden" name="currentTipe" value="{{$currentAnswer->tipe}}">
                            <div class="soal col-span-5 mb-8">
                                <div class="soal text-xl">
                                    {!! $currentSoal->body !!}
                                </div>
                                <div class="mt-5">
                                    @foreach ($currentSoal->options as $opsi)
                                    <div class="form-check">
                                        <label class="opsi font-normal opacity-100">
                                            {!!$opsi->body!!}
                                            <input class="option" type="radio" name="jawaban" value="{{$opsi->tipe}}" {{$opsi->tipe == $currentAnswer->value ? 'checked' : ''}} >
                                            <span class="checkmark">{{$opsi->tipe}}</span>
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="flex mt-4">
                                    @if ($no != 1)
                                        <button type="submit" name="GantiNo" value="prev" class="bg-pink-atas rounded-full text-white py-1 px-6 mr-3 hover:bg-pink-400 transition-colors" >
                                            prev
                                        </button>
                                    @endif
                                    @if ($no != count($answers))
                                        <button type="submit" name="GantiNo" value="next" class="bg-pink-atas rounded-full text-white py-1 px-6 hover:bg-pink-400 transition-colors" >
                                            next
                                        </button>
                                    @endif
                                </div>
                            </div>
                            <div class="col-span-1 flex justify-center items-center flex-col">
                                <div class="no flex-wrap flex justify-evenly">
                                    @foreach ($answers as $answer)
                                    <button type="submit" name="GantiNo" value="{{$loop->iteration}}" class="{{$loop->iteration == $no ? 'bg-blue' : ($answer->value != null ? 'bg-pink-atas' : 'bg-white') }} mb-3 self hover:bg-pink-atas border-4 border-pink-atas rounded-2xl px-4 py-1">
                                        {{$loop->iteration}}
                                    </button>
                                    @endforeach
                                </div>
                                <button type="submit" name="GantiNo" value="save" class="px-6 py-1 btn-blue">selesai</button>
                            </div>
                        </form>
                    </div>
                </div>
            </form>
            </div>
        </div>  
    </div>
    <script src="{{asset('js/timerInit.js')}}"></script>
    <script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"
    ></script>;
    <script>
        // Set the date we're counting down to
        var countDownDate = new Date({{$progress->stop_time}}).getTime();
        function expiredFunction(){
            document.getElementById("formSoal").submit();
        }
        timerInit('countdown', countDownDate, expiredFunction);
        
        $("input[type='radio']").click(function(e) {
            var previousValue = $(this).attr('previousValue');
            var name = $(this).attr('name');

            if (previousValue == 'checked') {
            e.target.checked=false;
            $(this).removeAttr('checked');
            $(this).attr('previousValue', false);
            } else {
            $("input[name="+name+"]:radio").attr('previousValue', false);
            $(this).attr('previousValue', 'checked');
            }
        });
        </script>
</x-app-layout> 