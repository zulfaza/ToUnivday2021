@section('judul')
    Edit Soal
@endsection


<x-app-layout>
    <div class="container mt-10">
        <x-AdminNavbar />
        <h1 class="text-5xl mt-4">Tambah Soal</h1>
        <br>
        <a class="text-black hover:text-pink-atas transition" href="{{route('admin.paket.soal.tambah', $soal->paket_id)}}" ><- Back</a>
        
        <div class="card-wrapper mt-5">

            <x-card header='Tambah Soal'>
                <form class="mt-4 text-xl"  action="{{route('admin.paket.soal.edit', $soal->id)}}" id="form" method="POST">
                    @csrf
                    <input type="hidden" name="jmlOpsi" id="jmlOpsi">
                    <input type="hidden" name="opsiTambah" id="opsiTambah">
                    <input type="hidden" name="opsiKurang" id="opsiKurang">
                    <div class="form-group">
                        <label for="no">No</label>
                        <input type="number" value="{{$soal->no}}" name="no" id="no" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="jenis">Jenis</label>
                        <select name="jenis" id="jenis" class="form-control">
                            @foreach ($listJenis as $jenis)
                                <option {{$soal->jenis_id == $jenis->id ? 'selected' : ''}} value="{{$jenis->id}}">{{$jenis->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="soal">Soal</label>
                        <textarea class="form-control" name="soal" id="soal" cols="30" rows="10">
                            {{$soal->body}}
                        </textarea>
                    </div>
                    @foreach ($listOpsi as $opsi)
                        <div class="form-group" id="grup_opsi_{{$opsi->tipe}}">
                            <label for="opsi_{{$opsi->tipe}}">Opsi {{$opsi->tipe}}</label>
                            <textarea class="form-control" name="opsi_{{$opsi->tipe}}" id="opsi_{{$opsi->tipe}}" cols="30" rows="10">
                                {{$opsi->body}}
                            </textarea>
                        </div>
                    @endforeach
                    <button type="button" class="btn btn-blue" id="addOpsi" onclick="TambahOpsi()">Tambah Opsi</button>
                    <button type="button" class="btn btn-blue opacity-50 {{count($listOpsi) < 3 ? "hidden" : ''}}" id="deleteOpsi" onclick="HapusOpsi()">Hapus Opsi</button>
                    <div class="form-group">
                        <label for="jawaban">Jawaban</label>
                        <select name="jawaban" id="jawaban" class="form-control">
                            @foreach ($listOpsi as $opsi)
                            <option value="{{$opsi->tipe}}" id="option_{{$opsi->tipe}}" {{$opsi->tipe == $soal->answer ? 'selected' : ''}}>{{$opsi->tipe}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <button class="btn btn-blue">Buat</button>
                </form>
            </x-card>

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
    let deletedOpsi = []
    let newAddedOpsi = []
    let i = {{count($listOpsi)-2}};
    let addOptionBtn = document.getElementById('addOpsi')
    let deleteOptionBtn = document.getElementById('deleteOpsi')
    let form = document.getElementById('form')
    let jmlOpsi = document.getElementById('jmlOpsi');
    
    function updateStatusOpsi() {
        document.getElementById('opsiTambah').value = newAddedOpsi.toString()
        document.getElementById('opsiKurang').value = deletedOpsi.toString()
    }


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
            if(newAddedOpsi.includes(index[i])){
                newAddedOpsi = newAddedOpsi.filter(data=>{
                   return index[i] !== data;
               }) 
            }else{
                deletedOpsi.push(index[i])
            }
            updateStatusOpsi() 
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
            
            if(deletedOpsi.includes(index[i])){
               deletedOpsi = deletedOpsi.filter(data=>{
                   return index[i] !== data;
               }) 
            }else{
                newAddedOpsi.push(index[i])
            }
            i++;
            jmlOpsi.setAttribute('value',i);
            if(i==3){
                addOptionBtn.classList.add('hidden');
            }
            updateStatusOpsi() 
        }
    }
    initMCEexact('#soal')
    @foreach ($listOpsi as $opsi)
        initMCEexact('#opsi_{{$opsi->tipe}}') 
    @endforeach
    </script>
</x-app-layout>