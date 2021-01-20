<x-app-layout>
    <div class="container">
        <form action="{{route('upload')}}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="form-group">
            <input type="file" name="file" id="file">
        </div>
        <button class="btn btn-blue">Upload</button>
        </form>
    </div>
</x-app-layout>