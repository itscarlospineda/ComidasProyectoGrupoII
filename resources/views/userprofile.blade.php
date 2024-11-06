@extends('layouts.main')

<title>@yield('title', 'Ajustes de Perfil')</title>

<style>
    .header {
        background-image: linear-gradient(to right, rgb(0 0 0 / .7), rgb(0 0 0 / .7)), url({{ Vite::asset('resources/images/gringas.jpg')}});
    }

    .drop-div {
        height: 500px;
        width: 500px;
        margin: 20px;
        padding-top: 100px;
        border-radius: 20px;
        border: 2.5px dashed rgb(248, 185, 12);
        background-color: rgb(248, 235, 200);
    }
</style>
@section('content')

        <div class="modelo">
            <p class="modelo__nombre">Ajustes de Perfil</p>
        </div>
    </div>
</header>

<div class="container">
    <div class="col-md-3"> 
        <a class="producto__enlace" href="/settings">
            <span class="producto__descripcion">Volver a Opciones</span>
        </a>
    </div>
</div>

<!--<div class="container col-md-12">
    <div class="p-4 m-2">
        <a class="producto__enlace" href="/settings" style="height:10vh;">Cambiar información de Cuenta</a>
        <a class="producto__enlace" href="/settings">Cambiar Foto de Perfil</a>
    </div>
</div>-->

<div class="container">
    <h1 class="productos__heading">Ajustes de Información de Perfil</h1>
    <p class="cursos__texto text-black">Aquí puedes cambiar algunos de los datos que adjuntaste al
        registrarte con nosotros en tu primera visita. 
    </p>
</div>
<div class="container pt-4" style="border: 3px solid black; padding:20px; border-radius:10px; margin-top:5vh;">
    <form action="{{ route('editusers.show',[$user->id])}}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="col-md-10 mb-3">
                    <label for="title" class="form-label producto__nombre">Nombre de Usuario</label>
                    <input type="text" class="form-control producto__descripcion" name="title" value="{{$user->username}}">
                </div>
                <div class="col-md-10 mb-3">
                    <label for="title" class="form-label producto__nombre">Primer Nombre</label>
                    <input type="text" class="form-control producto__descripcion" name="fname" value="{{$user->fname}}">
                </div>
                <div class="col-md-10 mb-3">
                    <label for="content" class="form-label producto__nombre">Primer Apellido</label>
                    <input type="text" class="form-control producto__descripcion" name="lname" value="{{$user->lname}}">
                </div>
                
            </div>

            <div class="col-md-6">
                <div class="col-md-10 mb-3">
                    <label for="content" class="form-label producto__nombre">Correo Electrónico</label>
                    <input type="text" class="form-control producto__descripcion" name="email" value="{{$user->email}}">
                </div>
                <div class="col-md-10 mb-3">
                    <label for="content" class="form-label producto__nombre">Número de Celular (####-####)</label>
                    <input type="text" class="form-control producto__descripcion" name="email" value="{{$user->phone_num}}">
                </div>
                <div class="col-md-10 mb-3">
                    <label for="content" class="form-label producto__nombre">Dirección</label>
                    <input type="text" class="form-control producto__descripcion" name="email" value="{{$user->address}}">
                </div>
            </div>
        </div>
        <a class="producto__enlace">Modificar Datos</a>
    </form>
      
</div>


<div class="container">
    <div class="row">
        <div class="col-md-6"> <br><br><br><br><br>
            <h1 class="productos__heading">Actualizar Foto de Perfil</h1>
            <p class="cursos__texto text-black">Aquí puedes cambiar tu foto de perfil subiendo una nueva
            desde tu galería u ordenador.
            </p>
        </div>

        <div class="col-md-6">
            <div class="container pt-4" style="border: 3px solid black; border-radius:10px; margin-top:10vh; margin-bottom: 5vh;">
                <center>
                    <form id="uploadForm" enctype="multipart/form-data">
                        @csrf
                            <div id="drop-area" class="drop-div">
                                <h2>Drag & Drop to Upload Profile Picture</h2>
                                <input type="file" id="fileElem" accept="image/*" style="display:none;">
                                <label class="btn btn-primary" for="fileElem">Select a file</label>
                                <div id="gallery" class="gallery mt-3"></div> <br>
                                <button id="upload-btn" type="submit" class="btn btn-success">Upload</button>
                            </div> 
                            <br>
                            <div id="feedback-message" class="mt-3"></div> <!-- Feedback message area -->
                            <input type="hidden" id="uploaded-image" name="uploaded_image" value="">
                    </form>
                </center>
            </div>
        </div>

    </div>

</div>
                    
               
<script>
    const dropArea = document.getElementById('drop-area');
    const fileElem = document.getElementById('fileElem');
    const gallery = document.getElementById('gallery');
    let selectedFile;

    dropArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropArea.classList.add('highlight');
    });

    dropArea.addEventListener('dragleave', () => {
        dropArea.classList.remove('highlight');
    });

    dropArea.addEventListener('drop', (e) => {
        e.preventDefault();
        dropArea.classList.remove('highlight');
        selectedFile = e.dataTransfer.files[0];
        showFile(selectedFile);
    });

    fileElem.addEventListener('change', (e) => {
        selectedFile = e.target.files[0];
        showFile(selectedFile);
    });

    function showFile(file) {
        const reader = new FileReader();
        reader.onload = (e) => {
            gallery.innerHTML = `<img src="${e.target.result}" alt="Preview" style="max-width: 200px; max-height: 200px;">`;
            document.getElementById('uploaded-image').value = file.name;
        };
        reader.readAsDataURL(file);
    }

    document.getElementById('upload-btn').addEventListener('click', async (event) => {
        event.preventDefault(); 
        if (!selectedFile) return alert('No file selected!');

        const formData = new FormData();
        formData.append('profile_picture', selectedFile);

        try {
            const userId = {{ Auth::id() }}; 
            const response = await fetch('{{ route('profile.upload', ['id' => Auth::id()]) }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            });

            if (!response.ok) {
                throw new Error('Upload failed: ' + response.statusText);
            }

            const data = await response.json();
            document.getElementById('feedback-message').innerHTML = `<div class="alert alert-success">Upload successful: ${data.message}</div>`;
            console.log('Upload successful:', data);
            setTimeout(() => {
                window.location.href = '/settings';
            }, 3000); 

        } catch (error) {
            console.error('Error:', error);
            document.getElementById('feedback-message').innerHTML = `<div class="alert alert-danger">Error: ${error.message}</div>`;
        }
    });
</script>
@endsection 
