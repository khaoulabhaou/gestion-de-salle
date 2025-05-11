@extends('layouts.app')

@section('title', 'Nos Cours')

@section('content')
<div class="main-banner" id="top">
    <div class="video-overlay header-text">
    </div>
</div>

    <!-- ***** Nos Cours - Début ***** -->
    <section class="section" id="our-classes">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading">
                        <h2>Nos <em>Cours</em></h2>
                        <img src="{{ asset('images/line-dec.png') }}" alt="décoration">
                        <p>Découvrez notre sélection de cours premium conçus pour répondre à tous vos objectifs fitness, quels que soient votre niveau et vos aspirations.</p>
                    </div>
                </div>
            </div>
            <div class="row" id="tabs">
              <div class="col-lg-4">
                <ul>
                  <li><a href='#tabs-1'><img src="{{ asset('images/tabs-first-icon.png') }}" alt="">Cours Débutant</a></li>
                  <li><a href='#tabs-2'><img src="{{ asset('images/tabs-first-icon.png') }}" alt="">Cours Intermédiaire</a></a></li>
                  <li><a href='#tabs-3'><img src="{{ asset('images/tabs-first-icon.png') }}" alt="">Cours Avancé</a></a></li>
                  <li><a href='#tabs-4'><img src="{{ asset('images/tabs-first-icon.png') }}" alt="">Cours Privé</a></a></li>
                  <div class="main-rounded-button"><a href="{{ route('schedules') }}">Voir Tous les Horaires</a></div>
                </ul>
              </div>
              <div class="col-lg-8">
                <section class='tabs-content'>
                  <article id='tabs-1'>
                    <img src="{{ asset('images/training-image-01.jpg') }}" alt="Cours Débutant">
                    <h4>Cours Débutant</h4>
                    <p>Parfait pour ceux qui commencent leur parcours fitness. Nos coachs certifiés vous guideront pas à pas dans des exercices adaptés à votre niveau, en mettant l'accent sur la technique et la sécurité.</p>
                    <div class="main-button">
                        <a href="{{ route('schedules') }}">Voir les Horaires</a>
                    </div>
                  </article>
                  <article id='tabs-2'>
                    <img src="{{ asset('images/training-image-02.jpg') }}" alt="Cours Intermédiaire">
                    <h4>Cours Intermédiaire</h4>
                    <p>Pour ceux qui maîtrisent les bases et veulent passer au niveau supérieur. Ce cours intensif combine cardio et musculation pour des résultats optimaux, avec des exercices variés et motivants.</p>
                    <div class="main-button">
                        <a href="{{ route('schedules') }}">Voir les Horaires</a>
                    </div>
                  </article>
                  <article id='tabs-3'>
                    <img src="{{ asset('images/training-image-03.jpg') }}" alt="Cours Avancé">
                    <h4>Cours Avancé</h4>
                    <p>Un programme exigeant pour athlètes confirmés. Poussez vos limites avec des séances haute intensité, des circuits training et des techniques professionnelles sous la supervision de nos meilleurs coachs.</p>
                    <div class="main-button">
                        <a href="{{ route('schedules') }}">Voir les Horaires</a>
                    </div>
                  </article>
                  <article id='tabs-4'>
                    <img src="{{ asset('images/training-image-04.jpg') }}" alt="Cours Privé">
                    <h4>Cours Privé</h4>
                    <p>Un coaching 100% personnalisé adapté à vos objectifs spécifiques. Bénéficiez de l'attention exclusive d'un de nos experts pour un programme sur mesure et des résultats optimaux.</p>
                    <div class="main-button">
                        <a href="{{ route('schedules') }}">Voir les Horaires</a>
                    </div>
                  </article>
                </section>
              </div>
            </div>
        </div>
    </section>
    <!-- ***** Nos Cours - Fin ***** -->
@endsection