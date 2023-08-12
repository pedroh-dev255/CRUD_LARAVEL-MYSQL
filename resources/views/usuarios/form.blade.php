@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <input type="button" value="Voltar" onClick='window.history.go(-1)'>
            <div class="card">
                <div class="card-header">@if(Request::is('*/edit'))  {{ __('Editar Usuario') }} @else {{ __('Adicionar Usuarios') }} @endif</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Request::is('*/edit'))
                    <form action="{{url('usuarios/update')}}/{{ $usuario->id }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName">Nome:</label>
                            <input type="text" name="name" class="form-control" value ="{{ $usuario->name }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email:</label>
                            <input type="email" name="email" class="form-control" value ="{{ $usuario->email }}">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Editar</button>
                    </form>
                    @else
                    <form action="{{ url('usuarios/add')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputName">Nome:</label>
                            <input type="text" name="name" class="form-control" placeholder="Incira o nome do usuario">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email:</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
