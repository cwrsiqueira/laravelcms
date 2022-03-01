@extends('adminlte::page')

@section('title')
    Usuários
@endsection

@section('content_header')
    <h1>
        Meus Usuários
        <a href=" {{ route('users.create') }} " class="btn btn-sm btn-success">Novo Usuário</a>
    </h1>
@endsection

@section('content')

<div class="card">
    <div class="card-body">
        <div class="box">
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>e-mail</th>
                            <th colspan="2" style="text-align:center;">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td style="text-align:center;">
                                <a href=" {{ route('users.edit', [ 'user' => $user->id ]) }} " class="btn btn-sm btn-info">Editar</a>
                            </td>
                            <td style="text-align:center;">
                                <form action=" {{ route('users.destroy', [ 'user' => $user->id ]) }} " method="POST" 
                                    @if ($loggedId == $user->id)
                                        onsubmit="return alert('Você não pode excluir seu próprio usuário.')"
                                    @else
                                        onsubmit="return confirm('Confirma a exclusão do usuário?')"
                                    @endif 
                                >
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Excluir</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
{{ $users->links() }}
  
@endsection