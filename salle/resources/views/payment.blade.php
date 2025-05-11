@extends('layouts.app')

@section('title', 'Finalisez Votre Paiement')

@section('content')
<div class="main-banner" id="top">
    <div class="video-overlay header-text"></div>
</div>

<div class="container py-5" style="margin-top: 5rem; background-color: #f8f9fa;">
    <h2 class="text-center mb-4">Finalisez Votre Abonnement</h2>
    
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show">
            <i class="fas fa-exclamation-circle me-2"></i>
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
        </div>
    @endif
    
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            <i class="fas fa-check-circle me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fermer"></button>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-header bg-white text-center py-3 border-0">
                    <h4 class="card-title mb-0">{{ $membership->name }}</h4>
                </div>
                <div class="card-body">
                    <p class="text-center text-muted mb-4">{{ $membership->description }}</p>
                    <div class="text-center mb-4">
                        <span class="h3 fw-bold">{{ number_format($membership->price, 2) }}MRU</span>
                        <span class="text-muted">/mois</span>
                    </div>

                    <form action="{{ route('payment.process', $membership) }}" method="POST">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="payment_method" class="form-label">Méthode de paiement</label>
                            <select name="payment_method" class="form-select p-3" required>
                                <option value="cash">Espèces</option>
                                <option value="card">Carte de crédit</option>
                            </select>
                        </div>

                        <button type="submit" class="btn w-100 text-white py-3 payment-btn">
                            <i class="fas fa-lock me-2"></i>Payer maintenant
                        </button>
                    </form>
                </div>
                <div class="card-footer bg-white border-0 text-center pt-0 pb-3">
                    <small class="text-muted">
                        <i class="fas fa-shield-alt me-1"></i>Paiement sécurisé
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .payment-btn {
        background-color: #ed563b;
        font-weight: 600;
        border-radius: 8px;
        transition: all 0.3s ease;
        border: none;
    }
    
    .payment-btn:hover {
        background-color: #d04a2b;
        transform: translateY(-2px);
    }
    
    .card {
        border-radius: 12px;
    }
    
    .form-select {
        border-radius: 8px;
        border: 1px solid #ddd;
    }
    
    body {
        background-color: #f8f9fa;
    }
</style>

@endsection