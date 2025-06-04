@extends('layouts.app')

@section('title', 'Messages')

@section('content')
<div class="main-banner" id="top">
    <div class="video-overlay header-text">
    </div>
</div>
<div class="container" style="margin-top: 7rem;">
    <h2 class="text-2xl font-bold mb-4">Messages des utilisateurs</h2>

    @if (session('success'))
        <div class="text-success mb-4">{{ session('success') }}</div>
    @endif

    <table class="table table-hover table-striped table-bordered w-full bg-white shadow-md rounded-lg overflow-hidden">
        <thead>
            <tr class="bg-gray-200 text-left">
                <th class="p-4">Nom</th>
                <th class="p-4">Email</th>
                <th class="p-4">Sujet</th>
                <th class="p-4">Message</th>
                <th class="p-4">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($messages as $msg)
            <tr class="border-b">
                <td class="p-4">{{ $msg->name }}</td>
                <td class="p-4">{{ $msg->email }}</td>
                <td class="p-4">{{ $msg->subject }}</td>
                <td class="p-4">{{ $msg->message }}</td>
                <td class="p-4 space-x-2 d-flex">
                    <a href="{{ route('admin.messages.respond', $msg->id) }}" class="text-success" style="margin-right: 1rem" title="Répondre">
                        <i class="fa-solid fa-reply"></i>
                    </a>
                    <form action="{{ route('admin.messages.delete', $msg->id) }}" method="POST" class="inline">
                        @csrf @method('DELETE')
                        <button onclick="return confirm('Es-tu sûr ?')" class="btn btn-link p-0 text-danger" title="Supprimer">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr><td colspan="5" class="p-4 text-center">Aucun message à afficher.</td></tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
