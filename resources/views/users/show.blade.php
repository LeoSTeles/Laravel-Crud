@extends('layouts.admin')
@section('content')

<div class="card mb-4 mt-4 shadow">
    <div class="card-header hstack gap-2">
        <span>Visualizar Usuário</span>
        <span class="ms-auto d-sm-flex flex-row">
            <a href="{{ route('user.index') }}" class="btn btn-info btn-sm me-1">Listar</a>
            <a href="{{ route('user.edit', ['user' => $user->id]) }}" class="btn btn-warning btn-sm me-1">Editar</a>
            <form method="POST" action="{{ route('user.destroy', ['user' =>$user->id])}}">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir o usuário?')">Excluir Usuário</button>
            </form>
        </span>
    </div>
    
    <div class="card-body">
        <x-alert />

        <dl class="row">
            <dt class="col-sm-3">ID</dt>
            <dd class="col-sm-9"> {{ $user->id }}</dd>

            <dt class="col-sm-3">Nome</dt>
            <dd class="col-sm-9"> {{ $user->name }}</dd>

            <dt class="col-sm-3">E-mail</dt>
            <dd class="col-sm-9"> {{ $user->email }}</dd>

            <dt class="col-sm-3">Data da Criação</dt>
            <dd class="col-sm-9"> {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i:s') }}</dd>

            <dt class="col-sm-3">Data da Edição</dt>
            <dd class="col-sm-9"> {{ \Carbon\Carbon::parse($user->created_at)->format('d/m/Y H:i:s') }}</dd>
        </dl>
    </div>
</div>
@endsection
