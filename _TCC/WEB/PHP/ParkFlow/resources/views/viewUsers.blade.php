@extends('layouts.main')
@section('title', 'Users - ParkFlow')

@section('header')
    @vite(['resources/css/viewUsers.css'])
@endsection

@section('content')

    <div class="table-section">

        <div class="table-header">
            <h1>Usuários</h1>

            <button class="primary">
                <span class="material-symbols-outlined">add</span>
                <p>Novo</p>
            </button>
        </div>

        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Company</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->company->name }}</td>
                    <td>
                        <form action="/updateUser/{{ $user->id }}" method="GET">
                            <button class="secondary" type="submit">
                                <span class="material-symbols-outlined">edit</span>
                                <p>Editar</p>
                            </button>
                        </form>
                    </td>
                    <td>
                        <form action="/deleteUser/{{ $user->id }}" method="get">
                            <button class="secondary danger" type="submit">
                                <span class="material-symbols-outlined">delete</span>
                                <p>Excluir</p>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>


    @if ($editedUser)
        <div class="edit-user-container">
            <h1>Atualizar Usuário</h1>
            <form action="/updateUser/{{ $editedUser->id }}" method="POST">
                @csrf
                <div class="input-container">
                    <input type="text" name="username" required value="{{ $editedUser->name }}">
                    <label for="username">Name</label>
                </div>
                <div class="input-container">
                    <input type="email" name="email" required value="{{ $editedUser->email }}">
                    <label for="email">Email</label>
                </div>
                <div class="input-container">
                    <input type="text" name="phone" required value="{{ $editedUser->phone }}">
                    <label for="phone">Phone</label>
                </div>
                <div class="input-container">
                    <select name="company">
                        @foreach ($companies as $company)
                        <option
                            value="{{ $company->id }}"
                            @if ($editedUser->company_id == $company->id)
                                selected
                            @endif
                        >
                            {{$company->name}}
                        </option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="primary">
                    SALVAR
                </button>
            </form>
            <form action="/users" method="get">
                <button type="submit">CANCELAR</button>
            </form>
        </div>
    @endif
@endsection
