<div class="card mb-4 px-8 py-6 border-4 border-pink-atas">
    <div class="card-header">
        <h3 class="text-2xl text-black font-bold capitalize" >{{$header}}</h3>
        <hr>
    </div>
    <div {{ $attributes->merge(['class' =>'card-body'] ) }}">
        {{$slot}}
    </div>
</div>