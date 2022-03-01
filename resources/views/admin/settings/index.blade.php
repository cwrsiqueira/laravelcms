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
            <form class="form-horizontal" action="{{ route('settings.save') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                    <div class="form-group row">
                        <label for="logo" class="col-sm-2 col-form-label">Logo <br> (PNG, JPEG, JPG)</label>
                        <div class="col-sm-10">
                            <input type="file" name="logo" class="form-control">
                            <div style="background-color:rgb(158, 158, 158);width:100px;height:100px;display:flex;justify-content:center;align-items:center;margin: 10px;">
                                <img style="width: 100%;" src="{{ asset('media/images').('/'.$settings['logo'] ?? '/logo.png') }}">
                            </div>
                        </div>
                    </div>

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
                        <label for="telefone" class="col-sm-2 col-form-label">Telefone</label>
                        <div class="col-sm-10">
                            <input type="text" name="telefone" id="telefone" placeholder="Telefone" class="form-control" value="{{ $settings['telefone'] }}">
                        </div>
                    </div>

                    <h5>Cores do Menu e Rodapé</h5>

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

                    <h5>Redes Sociais</h5>

                    <div class="form-group row">
                        <label for="facebook" class="col-sm-2 col-form-label">Facebook</label>
                        <div class="col-sm-10">
                            <input type="text" name="facebook" id="facebook" placeholder="https://facebook/" class="form-control" value="{{ $settings['facebook'] }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="twitter" class="col-sm-2 col-form-label">Twitter</label>
                        <div class="col-sm-10">
                            <input type="text" name="twitter" id="twitter" placeholder="https://twitter/" class="form-control" value="{{ $settings['twitter'] }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="instagram" class="col-sm-2 col-form-label">Instagram</label>
                        <div class="col-sm-10">
                            <input type="text" name="instagram" id="instagram" placeholder="https://instagram/" class="form-control" value="{{ $settings['instagram'] }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="youtube" class="col-sm-2 col-form-label">YouTube</label>
                        <div class="col-sm-10">
                            <input type="text" name="youtube" id="youtube" placeholder="https://youtube/" class="form-control" value="{{ $settings['youtube'] }}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="linkedin" class="col-sm-2 col-form-label">Linkedin</label>
                        <div class="col-sm-10">
                            <input type="text" name="linkedin" id="linkedin" placeholder="https://linkedin/" class="form-control" value="{{ $settings['linkedin'] }}">
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
