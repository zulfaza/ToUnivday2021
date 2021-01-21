@section('judul')
    Tambah Soal {{$paket->name}}
@endsection


<x-app-layout>
    <div class="container mt-10">
        <x-AdminNavbar />
        <h1 class="text-5xl mt-4">Tambah Soal</h1>
        <br>
        <a class="text-black hover:text-pink-atas transition" href="{{route('admin.paket.list')}}" ><- Back</a>
        
        <div class="card-wrapper mt-5">

            <div class="md:grid grid-cols-6 gap-4">
                <div class="col-span-4">
                    <x-card header='Tambah Soal'>
                        <form class="mt-4 text-xl"  action="{{route('admin.paket.soal.tambah', $paket->id)}}" id="form" method="POST">
                            @csrf
                            <input type="hidden" name="jmlOpsi" id="jmlOpsi">
                            <div class="form-group">
                                <label for="no">No</label>
                                <input type="number" name="no" id="no" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="jenis">Jenis</label>
                                <select name="jenis" id="jenis" class="form-control" required>
                                    @foreach ($listJenis as $jenis)
                                        <option value="{{$jenis->id}}">{{$jenis->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="soal">Soal</label>
                                <textarea class="form-control" name="soal" id="soal" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="opsi_A">Opsi A</label>
                                <textarea class="form-control" name="opsi_A" id="opsi_a" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="opsi_B">Opsi B</label>
                                <textarea class="form-control" name="opsi_B" id="opsi_b" cols="30" rows="10"></textarea>
                            </div>
                            <button type="button" class="btn btn-blue" id="addOpsi" onclick="TambahOpsi()">Tambah Opsi</button>
                            <button type="button" class="btn btn-blue opacity-50 hidden" id="deleteOpsi" onclick="HapusOpsi()">Hapus Opsi</button>
                            <div class="form-group">
                                <label for="jawaban">Jawaban</label>
                                <select name="jawaban" id="jawaban" class="form-control" required>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                </select>
                            </div>
                            
                            <button class="btn btn-blue">Buat</button>
                        </form>
                    </x-card>
                </div>
                <div class="col-span-2">
                    @if (count($listSoal) > 0)
                        @foreach ($listSoal as $soal)
                            <div class="border-4 px-4 py-6 border-pink-atas rounded-lg mb-4 flex justify-between">
                                <div class="judul font-bold">
                                    Soal No {{$soal->no}}
                                </div>
                                <div class="btn-wrapper">
                                    <a class="btn btn-blue" href="{{route('admin.paket.soal.edit', $soal->id)}}">Edit</a>
                                    <a class="btn btn-blue opacity-50" href="{{route('admin.paket.soal.hapus', $soal->id)}}">Hapus</a>
                                </div>
                            </div>
                        @endforeach
                    @else
                        Belum ada soal
                    @endif
                </div>
            </div>

        </div>

    </div>
    <script src="https://cdn.tiny.cloud/1/vrt6aa3wr0siwirjjmk234ig94d6dgkc1vuin23b9jaid2li/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script
    src="https://code.jquery.com/jquery-3.5.1.min.js"
    integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
    crossorigin="anonymous"
    ></script>;
    <script src="{{asset('js/tinyMCEinit.js')}}"></script>
    <script>
    let index = ['C','D','E'];
    let i = 0;
    let addOptionBtn = document.getElementById('addOpsi')
    let deleteOptionBtn = document.getElementById('deleteOpsi')
    let form = document.getElementById('form')
    let jmlOpsi = document.getElementById('jmlOpsi');

    function HapusOpsi(){
        if(i>0){
            i--;
            addOptionBtn.classList.remove('hidden');
            tinymce.EditorManager.remove('#opsi_'+index[i]);
            document.getElementById('grup_opsi_'+index[i]).remove();
            document.getElementById('option_'+index[i]).remove();
            jmlOpsi.setAttribute('value',i);
            if(i==0){
                deleteOptionBtn.classList.add('hidden');
            }
        }
    }
    function TambahOpsi(){
        if (i<3) {
            deleteOptionBtn.classList.remove('hidden');
            let formGroup = document.createElement("div");
            let id = 'opsi_'+index[i];
            formGroup.setAttribute("class","form-group");
            formGroup.setAttribute('id','grup_'+id);
            let label = document.createElement("label");
            label.innerText = "Opsi "+index[i];
            formGroup.appendChild(label);
            let textarea = document.createElement("textarea");
            textarea.setAttribute('id', id);
            textarea.setAttribute('class','form-control');
            textarea.setAttribute('name','opsi_'+index[i]);
            formGroup.appendChild(textarea);
            form.insertBefore(formGroup,addOptionBtn);
            let option = document.createElement("option");
            option.setAttribute('value',index[i]);
            option.setAttribute('id','option_'+index[i]);

            option.innerHTML=index[i];
            let options = document.getElementById('jawaban');
            options.appendChild(option);
            initMCEexact('#'+id);
            i++;
            jmlOpsi.setAttribute('value',i);
            if(i==3){
                addOptionBtn.classList.add('hidden');
            }
        }
    }
    initMCEexact('#soal')
    initMCEexact('#opsi_a')
    initMCEexact('#opsi_b')
    </script>
</x-app-layout>