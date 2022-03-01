@extends('adminlte::page')

@section('title', 'Perfil')

@section('content_header')
    <h1>
        Meu Perfil
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
                    <li> {{ $error }} </li>
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
            <form class="form-horizontal" action=" {{ route('profile.save') }} " method="POST">
                @csrf
                @method('PUT')
        
                <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Nome</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" id="name" placeholder="Nome" class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                        <div class="col-sm-10">
                            <input type="email" name="email" id="email" placeholder="E-mail" class="form-control @error('email') is-invalid @enderror" value="{{$user->email}}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Senha</label>
                        <div class="col-sm-10">
                            <input type="password" name="password" id="password" placeholder="Senha" class="form-control @error('password') is-invalid @enderror" >
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="password_confirmation" class="col-sm-2 col-form-label">Confirmar Senha</label>
                        <div class="col-sm-10">
                            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirmar Senha" class="form-control @error('password') is-invalid @enderror" >
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
