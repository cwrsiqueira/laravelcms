@extends('adminlte::page')

@section('title')
    Nova Página
@endsection

@section('content_header')
    <h1>
        Nova Página
    </h1>
@endsection

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            <h5>
                <i class="icon fas fa-ban"></i>
                Erro!!!
            </h5>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form class="form-horizontal" action="{{ route('pages.store') }}" method="POST">
                @csrf
        
                <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Título</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" id="title" placeholder="Título" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="body" class="col-sm-2 col-form-label">Corpo</label>
                        <div class="col-sm-10">
                            <textarea type="body" name="body" id="body" placeholder="Corpo" class="form-control bodyfield">{{old('body')}}</textarea>
                        </div>
                    </div>
        
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <input type="submit" value="Criar" class="btn btn-info">
                            </div>
                        </div>
                    </div>

              </form>
        </div>
    </div>

    <script src="https://cdn.tiny.cloud/1/wt9fuwqo0mtch0lfna0f7aazeox5fyd9ak5io8sy97b28plf/tinymce/5/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector:'textarea.bodyfield',
            height:300,
            menubar:false,
            plugins:['link', 'table', 'image', 'autoresize', 'lists'],
            toolbar:'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | table | link image | bullist numlist',
            content_css:[
                '{{asset('assets/css/content_css')}}'
            ],
            images_upload_url:'{{route('imageupload')}}',
            images_upload_credential:true,
            convert_urls:false,
        });
    </script>
    
@endsection
