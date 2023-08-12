@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <input type="button" value="Voltar" onClick='window.history.go(-1)'>
            <div class="card">
            
                <div class="card-header">{{ __('Lista dos Usuarios') }}</div>
                
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <table border="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Editar</th>
                                <th>Deletar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($usuarios as $u)
                            <tr>
                                <td>{{ $u -> id}}</td>
                                <td>{{ $u-> name }}</td>
                                <td>{{ $u->email }}</td>
                                <td><a href="usuarios/{{ $u->id }}/edit" style="font-size: 13px" class="btn btn-info">Edit 📋</a></td>
                                <td>
                                    <form action="{{url('usuarios/delete')}}/{{ $u->id }}" method="POST">
                                         @csrf
                                         @method('delete')
                                        <button type="submit" class="btn btn-danger">Del 🗑️</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <br>
                    <a href="{{ url('usuarios/new') }}">Cadastrar Usuarios</a>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
