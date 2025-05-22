@extends('layouts.admin')
@section('content')
<div class="card mb-4 mt-4 shadow">
    <div class="card-header hstack gap-2">
        <span>Listar Usuários</span>
        <span class="ms-auto"><a href="{{ route('user.create') }}" class="btn btn-success btn-sm">Cadastrar</a></span>
    </div>
    
    <div class="card-body">
        <x-alert />
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">E-mail</th>
                <th scope="col" class="text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
        @forelse ($users as $user)
            <tr>
                <th>{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td class="text-center">
                    <a href="{{ route('user.show', ['user' => $user->id]) }} " class="btn btn-primary btn-sm">Visualizar Usuário</a>
                    <a href="{{ route('user.edit', ['user' => $user->id]) }}" class="btn btn-warning btn-sm">Editar Usuário</a>
                    <form method="POST" action="{{ route('user.destroy', ['user' => $user->id]) }}" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir o usuário?')">Excluir
                            Usuário</button>
                    </form>
                </td>
            </tr>

                @empty
        @endforelse
        </tbody>
    </table>
    {{ $users->links() }}
</div>
</div>
@endsection
