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
                        <p>Training Studio est un template CSS gratuit pour salles de sport et centres de fitness. Vous pouvez utiliser cette mise en page pour votre site commercial.</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <ul class="features-items">
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="{{ asset('images/features-first-icon.png') }}" alt="Fitness de base">
                            </div>
                            <div class="right-content">
                                <h4>Fitness Basique</h4>
                                <p>Merci de ne pas redistribuer ce fichier ZIP sur des sites de collection de templates. Ce n'est pas autorisé.</p>
                                <a href="#" class="text-button">Découvrir Plus</a>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="{{ asset('images/features-first-icon.png') }}" alt="Nouvel entraînement">
                            </div>
                            <div class="right-content">
                                <h4>Nouveau Programme Gym</h4>
                                <p>Si vous souhaitez soutenir TemplateMo via PayPal, n'hésitez pas à nous contacter. Nous l'apprécions beaucoup.</p>
                                <a href="#" class="text-button">Découvrir Plus</a>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="{{ asset('images/features-first-icon.png') }}" alt="Cours de musculation">
                            </div>
                            <div class="right-content">
                                <h4>Cours de Musculation Basique</h4>
                                <p>Crédit à <a rel="nofollow" href="https://www.pexels.com" target="_blank">Pexels</a> pour les images et vidéos utilisées dans ce template HTML.</p>
                                <a href="#" class="text-button">Découvrir Plus</a>
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
                                <p>Vous pouvez parcourir nos templates <a rel="nofollow" href="https://templatemo.com/tag/digital-marketing" target="_parent">Marketing Digital</a> ou <a href="https://templatemo.com/tag/corporate">Corporate</a> sur notre site.</p>
                                <a href="#" class="text-button">Découvrir Plus</a>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="{{ asset('images/features-first-icon.png') }}" alt="Yoga">
                            </div>
                            <div class="right-content">
                                <h4>Cours de Yoga</h4>
                                <p>Ce template est construit sur le framework Bootstrap v4.3.1. Il est facile d'adapter les colonnes et sections.</p>
                                <a href="#" class="text-button">Découvrir Plus</a>
                            </div>
                        </li>
                        <li class="feature-item">
                            <div class="left-icon">
                                <img src="{{ asset('images/features-first-icon.png') }}" alt="Bodybuilding">
                            </div>
                            <div class="right-content">
                                <h4>Cours de Bodybuilding</h4>
                                <p>Suspendisse fringilla et nisi et mattis. Curabitur sed finibus nisi. Integer nibh sapien, vehicula et auctor.</p>
                                <a href="#" class="text-button">Découvrir Plus</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Section Programmes - Fin ***** -->

@endsection