@extends('adminlte::page')

@section('title')
    Páginas
@endsection

@section('content_header')
    <h1>
        Minhas Páginas
        <a href="{{ route('pages.create') }}" class="btn btn-sm btn-success">Nova Página</a>
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
                            <th>Título</th>
                            <th colspan="3" style="text-align:center;">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pages as $page)
                        <tr>
                            <td>{{$page->id}}</td>
                            <td>{{$page->title}}</td>

                            <td style="text-align:center;">
                                <a href="{{ route('pages.show', [ 'page' => $page->id ]) }}" class="btn btn-sm btn-primary" target="_blank">Visualizar</a>
                            </td>

                            <td style="text-align:center;">
                                <a href="{{ route('pages.edit', [ 'page' => $page->id ]) }}" class="btn btn-sm btn-info">Editar</a>
                            </td>

                            <td style="text-align:center;">
                                <form action="{{ route('pages.destroy', [ 'page' => $page->id ]) }}" method="POST" onsubmit="return confirm('Confirma a exclusão da página?')">
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
{{ $pages->links() }}
  
@endsection