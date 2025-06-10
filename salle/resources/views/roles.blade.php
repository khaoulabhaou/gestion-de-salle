@extends('layouts.app')

@section('title', 'Manage Users')

@section('content')
<div class="main-banner" id="top">
    <div class="video-overlay header-text">
    </div>
</div>
<div class="container" style="margin-top: 7rem">
    <h2 class="mb-4">Gestion des utilisateurs</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead>
            <tr>
                <th>Nom</th>
                <th>E-mail</th>
                <th>Rôle actuel</th>
                <th>Mettre à jour le rôle</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->role ?? 'N/A' }}</td>
                    <td>
                        <form action="{{ route('admin.users.updateRole') }}" method="POST">
                            @csrf
                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <select name="role" class="form-control d-inline w-auto">
                                <option value="user" @selected($user->role === 'user')>User</option>
                                <option value="coach" @selected($user->role === 'coach')>Coach</option>
                                <option value="admin" @selected($user->role === 'admin')>Admin</option>
                            </select>
                            <button type="submit" class="btn btn-success btn-sm ml-2">Save</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection