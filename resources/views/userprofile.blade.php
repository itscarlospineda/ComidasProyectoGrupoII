@extends('layouts.main')

<title>@yield('title', 'Ajustes de Perfil')</title>

<style>
    .header {
        background-image: linear-gradient(to right, rgb(0 0 0 / .7), rgb(0 0 0 / .7)), url({{ Vite::asset('resources/images/gringas.jpg')}});
    }

    .drop-parent {
        width: 500px;
        height: 500px;
        padding-top: 30px;
        padding-bottom: 30px;
        text-align: center;
        border: 3px solid black; 
        border-radius:20px;
        transition: none;
        overflow: hidden; 
    }

    
    .label {
    display: block;
    width: 100%;
    height: 100%;
}

    #drop-area {
        height: 100%;
        width: 100%;
        border-radius: 10px;
        align-items: center;
        border: 2.5px dashed rgb(248, 185, 12);
        background-color: rgb(248, 235, 200);
        background-position: center;
        background-size: cover;

    }



    #drop-area span {
        display: block;
        color: #777;
        margin-top: 15px;
        transition: none; 
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

<div class="container">
    <h1 class="productos__heading">Ajustes de Información de Perfil</h1>
    <p class="cursos__texto text-black">Aquí puedes cambiar algunos de los datos que adjuntaste al
        registrarte con nosotros en tu primera visita. 
    </p>
</div>
<div class="container p-4" style="border: 3px solid black; border-radius:20px; margin-top:5vh;">
    <form action="{{ route('editusers.show',[$user->id])}}" method="post">
        @csrf
        <div class="row p-4">
            <div class="col-md-6 p-2">
                <div class="col-md-10 mb-3">
                    <label for="username" class="form-label producto__nombre">Nombre de Usuario</label>
                    <input type="text" class="form-control producto__descripcion" name="username" value="{{$user->username}}">
                </div>
                <div class="col-md-10 mb-3">
                    <label for="fname" class="form-label producto__nombre">Primer Nombre</label>
                    <input type="text" class="form-control producto__descripcion" name="fname" value="{{$user->fname}}">
                </div>
                <div class="col-md-10 mb-3">
                    <label for="lname" class="form-label producto__nombre">Primer Apellido</label>
                    <input type="text" class="form-control producto__descripcion" name="lname" value="{{$user->lname}}">
                </div>
                
            </div>

            <div class="col-md-6 p-2">
                <div class="col-md-10 mb-3">
                    <label for="email" class="form-label producto__nombre">Correo Electrónico</label>
                    <input type="text" class="form-control producto__descripcion" name="email" value="{{$user->email}}">
                </div>
                <div class="col-md-10 mb-3">
                    <label for="phone_num" class="form-label producto__nombre">Número de Celular (####-####)</label>
                    <input type="text" class="form-control producto__descripcion" name="phone_num" value="{{$user->phone_num}}">
                </div>
                <div class="col-md-10 mb-3">
                    <label for="address" class="form-label producto__nombre">Dirección</label>
                    <input type="text" class="form-control producto__descripcion" name="address" value="{{$user->address}}">
                </div>
            </div>
        </div>
        <center>
            <div class="col-md-4">
                <a class="producto__enlace">
                    <span class="producto__descripcion">Modificar Datos</span>
                </a>
            </div>
        </center>
    </form>
      
</div>

<div class="container d-flex justify-content-center align-items-center vh-100" style="transition: none; ">
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-md-6"> 
            <h1 class="productos__heading text-center">Actualizar Foto de Perfil</h1>
            <p class="cursos__texto text-center text-black">
                Aquí puedes cambiar tu foto de perfil subiendo una nueva desde tu galería u ordenador.
            </p>
            <input type="hidden" id="uploaded-image" name="uploaded_image" value="">
        </div>

        <div class="col-md-6">
            <div class="container drop-parent">
                <form id="uploadForm" enctype="multipart/form-data">
                    <label for="fileElem" class="label">
                        <input type="file" id="fileElem" accept="image/*" hidden>
                        @csrf
                        <div id="drop-area" class="d-flex flex-column justify-content-center">
                            <p>Arrastra y suelta para cargar <br> una Foto de Perfil.</p>
                            <img src="{{ Vite::asset('resources/images/upload-icon.png') }}" alt="" style="width: 200px;">
                            <!--<label class="btn btn-primary" for="fileElem">Select a file</label>-->
                            <!--<div id="gallery" class="gallery mt-3"></div>-->
                            <span>Sube cualquier imagen <br> de tu dispositivo.</span>
                        </div> 
                    </label>
                </form>
                <center>
                    <a class="producto__enlace col-md-6" id="upload-btn" type="submit" hidden>
                        <span class="producto__descripcion">Guardar Imagen</span>
                    </a>
                    <div id="feedback-message" class="mt-3"></div> 
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
            dropArea.innerHTML = '';
            dropArea.innerHTML = `<img src="${e.target.result}" alt="Preview" style="max-width: 100%; max-height: 100%;">`;
            document.getElementById('uploaded-image').value = file.name;
            document.getElementById('upload-btn'). hidden = false;
        };
        reader.readAsDataURL(file);
    }

    /*function showFile(file) {
    const reader = new FileReader();
    reader.onload = (e) => {
        // Clear out previous gallery and add preview image
        gallery.innerHTML = '';  // Clear existing content in the gallery
        gallery.innerHTML = `<img src="${e.target.result}" alt="Preview" style="max-width: 80%; max-height: 80%; border-radius: 10px;">`;

        // Set hidden input for file name and show upload button
        document.getElementById('uploaded-image').value = file.name;
        document.getElementById('upload-btn').hidden = false;
    };
    reader.readAsDataURL(file);
}*/


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
