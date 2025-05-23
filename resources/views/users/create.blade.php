
@extends('layouts.admin')
@section('content')

<div class="card mb-4 mt-4 shadow">
    <div class="card-header hstack gap-2">
        <span>Cadastrar Usuário</span>
        <span class="ms-auto d-sm-flex flex-row">
            <a href="{{ route('user.index') }}" class="btn btn-info btn-sm me-1">Listar</a>
        </span>
    </div>
    
    <div class="card-body">
        <x-alert />
        <form action="{{ route('user-store') }}" method="POST" class="row g-3">
            @csrf
            @method('POST')

            <div class="col-md-12">
                <label for="name" class="form-label">Nome</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Nome Completo" value=" {{ old('name') }}">
            </div>
            
            <div class="col-md-6">
                <label for="email" class="form-label">E-mail</label>
                <input type="text" name="email" class="form-control" id="email" placeholder="Email" value=" {{ old('email') }}">
            </div>
            
            <div class="col-md-6">
                <label for="password" class="form-label">Senha</label>
                <input type="password" name="password" class="form-control" id="email" placeholder="Senha com pelo menos 6 caracteres" value="">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-success btn-sm">Cadastrar</button>
            </div>
        </form>
    </div>
</div>
@endsection
