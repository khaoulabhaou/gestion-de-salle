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
        <h1 class="display-4 fw-bold">Contactez-nous</h1>
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
                    <iframe src="https://maps.google.com/maps?q=Nouakchott,+Mauritania&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="500px" frameborder="0" style="border:0;" allowfullscreen></iframe>
                </div>
            </div>

            {{-- 📝 Formulaire de Contact --}}
            <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.4s">
                <div class="contact-form bg-white p-5 shadow rounded">
                    <h4 class="mb-4 text-light">Envoyez-nous un message</h4>
                    <form id="contact" action="" method="POST">
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
                    <p>Nouakchott, Mauritanie</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 rounded bg-white shadow-sm">
                    <i class="fas fa-phone-alt fa-2x text-secondary mb-3"></i>
                    <h5>Téléphone</h5>
                    <p>+222 00 00 00 00</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 rounded bg-white shadow-sm">
                    <i class="fas fa-envelope fa-2x text-secondary mb-3"></i>
                    <h5>Email</h5>
                    <p>contact@trainingstudio.com</p>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection