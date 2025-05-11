@extends('layouts.app')

@section('title', 'À Propos')

@section('content')
<div class="main-banner" id="top">
    <div class="video-overlay header-text">
    </div>
</div>
    <!-- ***** Section Programmes - Début ***** -->
    <section class="section" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Choisissez votre <em>Programme</em></h2>
                        <img src="{{ asset('images/line-dec.png') }}" alt="vagues décoratives">
                        <p>Découvrez nos différents programmes d'entraînement adaptés à vos objectifs et à votre niveau.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="features-items">
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="{{ asset('images/features-first-icon.png') }}" alt="Fitness de base">
                            </div>
                            <div class="right-content">
                                <h4>Programme Fitness Basique</h4>
                                <p>Un programme pour débutants, conçu pour améliorer votre forme physique et vous donner un bon point de départ.</p>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="{{ asset('images/features-first-icon.png') }}" alt="Nouvel entraînement">
                            </div>
                            <div class="right-content">
                                <h4>Programme de Gym Avancé</h4>
                                <p>Un entraînement plus intensif pour ceux qui cherchent à passer au niveau supérieur et à développer leur force.</p>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="{{ asset('images/features-first-icon.png') }}" alt="Cours de musculation">
                            </div>
                            <div class="right-content">
                                <h4>Cours de Musculation de Base</h4>
                                <p>Apprenez les techniques de musculation de base et construisez une fondation solide pour des entraînements plus avancés.</p>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <ul class="features-items">
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="{{ asset('images/features-first-icon.png') }}" alt="Musculation avancée">
                            </div>
                            <div class="right-content">
                                <h4>Cours de Musculation Avancée</h4>
                                <p>Progressez avec des techniques avancées de musculation pour cibler les muscles profonds et développer une force maximale.</p>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="{{ asset('images/features-first-icon.png') }}" alt="Yoga">
                            </div>
                            <div class="right-content">
                                <h4>Programme de Yoga</h4>
                                <p>Améliorez votre flexibilité, votre équilibre et votre bien-être mental avec nos séances de yoga relaxantes.</p>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="{{ asset('images/features-first-icon.png') }}" alt="Bodybuilding">
                            </div>
                            <div class="right-content">
                                <h4>Programme de Bodybuilding</h4>
                                <p>Boostez votre masse musculaire avec ce programme de bodybuilding, conçu pour ceux qui veulent transformer leur corps.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Section Programmes - Fin ***** -->

@endsection
