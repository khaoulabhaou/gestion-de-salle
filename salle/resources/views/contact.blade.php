@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<div class="main-banner" id="top">
    <div class="video-overlay header-text">
    </div>
</div>
{{-- ✨ En-tête de Page --}}
<div class="page-heading" style="background: url('/images/contact-bg.jpg') no-repeat center center; background-size: cover; padding: 100px 0;">
    <div class="container text-center text-white">
        <h1 class="display-4 fw-bold mt-5">Contactez-nous</h1>
        <p class="lead">Nous sommes à votre écoute. Envoyez-nous un message !</p>
    </div>
</div>

{{-- 📬 Section Contact --}}
<section class="section" id="contact-us">
    <div class="container">
        <div class="row g-4 align-items-stretch">
            
            {{-- 🗺️ Carte Google --}}
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="map-container shadow rounded overflow-hidden">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d743.6801329355234!2d-13.178590625635588!3d27.12650733314544!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xc377300585c426b%3A0xed8fdebf3a2b5026!2sVictory%20gym!5e1!3m2!1sar!2s!4v1747572314754!5m2!1sar!2s" width="600" height="645" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            {{-- 📝 Formulaire de Contact --}}
            <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.4s">
                <div class="contact-form bg-white p-5 shadow rounded">
                    {{-- Display Success Message --}}
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show text-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <h4 class="mb-4 text-light">Envoyez-nous un message</h4>
                    <form id="contact" action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input name="name" type="text" class="form-control" placeholder="Votre Nom*" required>
                        </div>
                        <div class="mb-3">
                            <input name="email" type="email" class="form-control" placeholder="Votre Email*" required>
                        </div>
                        <div class="mb-3">
                            <input name="subject" type="text" class="form-control" placeholder="Sujet">
                        </div>
                        <div class="mb-3">
                            <textarea name="message" rows="5" class="form-control" placeholder="Votre Message*" required></textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-secondary btn-lg">Envoyer le Message</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ℹ️ Informations de Contact --}}
<section class="py-5 bg-light">
    <div class="container">
        <div class="row g-4 text-center">
            <div class="col-md-4">
                <div class="p-4 rounded bg-white shadow-sm">
                    <i class="fas fa-map-marker-alt fa-2x text-secondary mb-3"></i>
                    <h5>Adresse</h5>
                    <p>Laâyoune, Quartier Elwifaq</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 rounded bg-white shadow-sm">
                    <i class="fas fa-phone-alt fa-2x text-secondary mb-3"></i>
                    <h5>Téléphone</h5>
                    <p>+212 601-000-010</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 rounded bg-white shadow-sm">
                    <i class="fas fa-envelope fa-2x text-secondary mb-3"></i>
                    <h5>Email</h5>
                    <p>trainingstudio101.com</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection