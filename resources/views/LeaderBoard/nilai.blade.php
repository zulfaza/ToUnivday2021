@section('judul')

Nilai {{$title}} |

@endsection

<x-app-layout>

<div class="w-screen h-full bg-pink-atas py-6">
    <div class="container">
        <div class="bg-white rounded-2xl shadow px-6 py-4">
            <h1 class="text-pink-atas text-2xl text-center my-5 md:text-5xl font-bold">Nilai {{$title}}</h1>
            <p class="text-center">
                Lihat Nilai <a class="text-blue hover:text-blue-500" href="{{$title=='Saintek' ? route('nilai.soshum') : route('nilai.saintek')}}">{{$title=='Saintek' ? 'Soshum' : 'Saintek'}}</a></p>
            <br/>
            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Nilai</th>
                    </tr>
                </thead>
                <tbody>
                        @foreach ($nilais as $nilai)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$nilai->user->username}}</td>
                            <td>{{$nilai->user->name}}</td>
                            <td>{{$nilai->user->kelas}}</td>
                            <td>{{$nilai->value}}</td>
                        </tr>
                        @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

</x-app-layout>