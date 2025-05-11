@extends('layouts.app')

@section('title', 'Choisissez Votre Abonnement')

@section('content')
<div class="main-banner" id="top">
    <div class="video-overlay header-text"></div>
</div>

<div class="container py-5" style="margin-top: 5rem; background-color: #f8f9fa;">
    <h2 class="text-center mb-4">Choisissez Votre Abonnement</h2>
    
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="fas fa-exclamation-circle me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row justify-content-center g-4">
        @foreach($memberships as $membership)
            <div class="col-lg-4 col-md-6">
                <div class="card h-100 membership-card">
                    <div class="card-header bg-white text-center py-3 border-0">
                        <h4 class="my-0 fw-bold text-success">{{ $membership->name }}</h4>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <ul class="list-unstyled mt-3 mb-4 text-center">
                            @foreach(explode("\n", $membership->description) as $feature)
                                <li class="mb-3"><i class="fas fa-check-circle text-success me-2"></i>{{ trim($feature) }}</li>
                            @endforeach
                        </ul>
                        <div class="text-center my-4">
                            <span class="display-4 fw-bold">{{ number_format($membership->price, 2) }}€</span>
                            <span class="text-muted">/mois</span>
                        </div>
                    </div>
                    <div class="card-footer bg-white border-0 pb-3 pt-0">
                        <form action="{{ route('payment.show', $membership->id) }}" method="GET">
                            @csrf
                            <button type="submit" class="btn w-100 text-white py-3 subscribe-btn">
                                <i class="fas fa-arrow-right me-2"></i>Souscrire maintenant
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

<div class="text-center mt-5">
    <p class="text-muted">Questions sur nos abonnements ? 
        <a href="{{ route('contact') }}" 
           class="contact-link">
            Contactez notre équipe
        </a>
    </p>
</div>

<style>
    .contact-link{
        transition: all 0.2s ease;
        color: #21961d
    }
    .contact-link:hover {
        color: #b93315; /* Slightly darker green */
    }
</style>
</div>

<style>
    body {
        background-color: #f8f9fa;
    }
    
    .membership-card {
        border-radius: 12px;
        transition: all 0.3s ease;
        border: none;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.08);
    }
    
    .membership-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.12);
    }
    
    .subscribe-btn {
        background-color: #ed563b;
        font-weight: 600;
        border-radius: 8px;
        transition: all 0.3s ease;
        border: none;
    }
    
    .subscribe-btn:hover {
        background-color: #d04a2b;
        transform: translateY(-2px);
    }
    
    .list-unstyled li {
        padding: 6px 0;
        border-bottom: 1px solid #f0f0f0;
    }
    
    .card-header {
        border-radius: 12px 12px 0 0 !important;
    }
    
    .display-4 {
        color: #2a2a2a;
    }
</style>

@endsection