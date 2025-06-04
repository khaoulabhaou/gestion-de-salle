@extends('layouts.app')

@section('title', 'Répondre au message')

@section('content')
<div class="container py-5" style="margin-top:5rem">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-sm">
                <div class="card-header text-white" style="background-color: #e46139">
                    <h5 class="mb-0">Répondre au message</h5>
                </div>

                <div class="card-body">
                    <div class="mb-3">
                        <p><strong>Nom :</strong> {{ $message->name }}</p>
                        <p><strong>Email :</strong> {{ $message->email }}</p>
                        <p><strong>Sujet :</strong> {{ $message->subject ?? 'N/A' }}</p>
                        <p><strong>Message :</strong></p>
                        <div class="alert alert-light border">
                            {{ $message->message }}
                        </div>
                    </div>

                    <form method="POST" action="{{ route('admin.messages.send', $message->id) }}">
                        @csrf
                        <div class="mb-3">
                            <label for="response" class="form-label">Votre réponse</label>
                            <textarea name="response" id="response" rows="6" class="form-control" required></textarea>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">Envoyer la réponse</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
