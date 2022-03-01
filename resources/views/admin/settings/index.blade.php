@extends('adminlte::page')

@section('title', 'Configurações')

@section('content_header')
    <h1>
        Configurações do Site
    </h1>
@endsection

@section('content')

    @if($errors->any())
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

    @if(session('warning'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
            <i class="icon fas fa-check-circle"></i> 
            <ul>
               {{session('warning')}}
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form class="form-horizontal" action="{{ route('settings.save') }}" method="POST">
                @csrf
                @method('PUT')
        
                    <div class="form-group row">
                        <label for="title" class="col-sm-2 col-form-label">Título</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" id="title" placeholder="Título" class="form-control" value="{{ $settings['title'] }}">
                        </div>
                    </div>
        
                    <div class="form-group row">
                        <label for="subtitle" class="col-sm-2 col-form-label">Subtítulo</label>
                        <div class="col-sm-10">
                            <input type="text" name="subtitle" id="subtitle" placeholder="Subtítulo" class="form-control" value="{{ $settings['subtitle'] }}">
                        </div>
                    </div>
        
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" id="email" placeholder="E-mail" class="form-control" value="{{ $settings['email'] }}">
                        </div>
                    </div>
        
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Cor do Fundo</label>
                        <div class="col-sm-10">
                            <input type="color" name="bgcolor" class="form-control" value="{{ $settings['bgcolor'] }}" style="width: 70px;">
                        </div>
                    </div>
        
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Cor da Letra</label>
                        <div class="col-sm-10">
                            <input type="color" name="textcolor" class="form-control" value="{{ $settings['textcolor'] }}" style="width: 70px;">
                        </div>
                    </div>
        
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <input type="submit" value="Salvar" class="btn btn-info">
                            </div>
                        </div>
                    </div>

              </form>
        </div>
    </div>
    
@endsection
