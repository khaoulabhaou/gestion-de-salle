@extends('layouts.app')

@section('title', 'Nos Entraîneurs')

@section('content')
<div class="main-banner" id="top">
    <div class="video-overlay header-text">
    </div>
</div>
<!-- ***** Section Entraîneurs Début ***** -->
<section class="section" id="trainers">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="section-heading">
                    <h2>Nos <em>Entraîneurs Experts</em></h2>
                    <img src="{{ asset('images/line-dec.png') }}" alt="">
                    <p>Découvrez notre équipe de professionnels qualifiés dédiés à votre progression et bien-être.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="trainer-item">
                    <div class="image-thumb">
                        <img src="{{ asset('images/first-trainer.jpg') }}" alt="Entraîneur Force">
                    </div>
                    <div class="down-content">
                        <span>Entraîneur Force</span>
                        <h4>Bret D. Bowers</h4>
                        <p>Spécialiste en développement de la force pure et préparation physique. Son approche scientifique maximise vos performances.</p>
                        <ul class="social-icons">
                            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fab fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="trainer-item">
                    <div class="image-thumb">
                        <img src="{{ asset('images/second-trainer.jpg') }}" alt="Entraîneur Musculation">
                    </div>
                    <div class="down-content">
                        <span>Entraîneur Musculation</span>
                        <h4>Hector T. Daigl</h4>
                        <p>Expert en hypertrophie musculaire et développement harmonieux du corps. Des programmes personnalisés pour chaque morphologie.</p>
                        <ul class="social-icons">
                            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fab fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="trainer-item">
                    <div class="image-thumb">
                        <img src="{{ asset('images/third-trainer.jpg') }}" alt="Entraîneur Performance">
                    </div>
                    <div class="down-content">
                        <span>Entraîneur Performance</span>
                        <h4>Paul D. Newman</h4>
                        <p>Spécialiste en préparation physique et optimisation des performances. Des méthodes éprouvées pour dépasser vos limites.</p>
                        <ul class="social-icons">
                            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fab fa-behance"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Section Entraîneurs Fin ***** -->
@endsection