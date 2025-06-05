@extends('layouts.app')

@section('title', 'Nos Cours')

@section('content')
<div class="main-banner" id="top">
    <div class="video-overlay header-text"></div>
</div>

<style>
  .custom-category-img {
    width: 735px;
    height: 407px;
    object-fit: cover;
    border-radius: 10px;
  }
</style>

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
                    @foreach($categories as $index => $categorie)
                        <li>
                            <a href="#tabs-{{ $index }}">
                                <img src="{{ asset('images/tabs-first-icon.png') }}" alt="">
                                {{ $categorie->nom }}
                            </a>
                        </li>
                    @endforeach
                    <div class="main-rounded-button">
                        <a href="{{ route('schedules') }}">Voir Tous les Horaires</a>
                    </div>
                </ul>
            </div>
            <div class="col-lg-8">
                <section class='tabs-content'>
                    @foreach($categories as $index => $categorie)
                        <article id="tabs-{{ $index }}">
                            <img src="{{ asset('storage/' . $categorie->image) }}" alt="{{ $categorie->nom }}" class="custom-category-img">
                            <h4>{{ $categorie->nom }}</h4>
                            <p>{{ $categorie->description }}</p>
                            @if($categorie->cours->count() > 0)
                                <div>
                                    <p style="margin-bottom: 0"><strong>Nos cours :</strong></p>
                                    <ul>
                                        @foreach($categorie->cours as $cours)
                                            <li style="font-size: 15px">{{ $cours->titre }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="main-button mt-3">
                                <a href="{{ route('schedules') }}">Voir les Horaires</a>
                            </div>
                        </article>
                    @endforeach
                </section>
            </div>
        </div>
    </div>
</section>
<!-- ***** Nos Cours - Fin ***** -->
@endsection
