@extends('layouts.app')
@php
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\DB;

    $hasMembership = false;

    if (Auth::check()) {
        $userEmail = Auth::user()->email;
        $hasMembership = DB::table('membres')
            ->where('email', $userEmail)
            ->where('abonnement_actif', true)
            ->exists();
    }
@endphp
<!-- ***** Zone de bannière principale - Début ***** -->
<div class="main-banner" id="top">
    <video autoplay muted loop id="bg-video">
        <source src="{{ asset('images/gym-video.mp4') }}" type="video/mp4" />
    </video>
    <div class="video-overlay header-text">
        <div class="caption">
            <h6>Travaillez plus dur, devenez plus fort</h6>
            <h2>Facile avec notre <em>salle de sport</em></h2>
              <div class="main-button scroll-to-section">
                  @if ($hasMembership)
                      <a href="{{ route('membership.info') }}">Mon Abonnement</a>
                  @else
                      <a href="{{ route('membership') }}">Devenir Membre</a>
                  @endif
              </div>
        </div>
    </div>
</div>
<!-- ***** Zone de bannière principale - Fin ***** -->

<!-- ***** Section Points Forts - Début ***** -->
<section class="section bg-light py-5" id="highlights">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-lg-12">
                <h2 class="section-title">Pourquoi Nous Choisir</h2>
                <p class="section-subtitle">Boostez vos objectifs avec notre espace, équipement et ambiance</p>
            </div>
        </div>
        <div class="row">
            <!-- Carte 1 -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100 text-center p-4">
                    <i class="fa fa-dumbbell fa-3x text-danger mb-3"></i>
                    <h5 class="card-title">Équipement Haut de Gamme</h5>
                    <p class="card-text">Entraînez-vous avec les derniers équipements et machines, adaptés à tous niveaux.</p>
                </div>
            </div>
            <!-- Carte 2 -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100 text-center p-4">
                    <i class="fa fa-fire fa-3x text-warning mb-3"></i>
                    <h5 class="card-title">Ambiance Intense</h5>
                    <p class="card-text">L'énergie ici est unique. Musique, lumières et vraie motivation.</p>
                </div>
            </div>
            <!-- Carte 3 -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100 text-center p-4">
                    <i class="fa fa-heartbeat fa-3x text-success mb-3"></i>
                    <h5 class="card-title">Bien-être en Priorité</h5>
                    <p class="card-text">De la musculation à la récupération, nous pensons à votre santé globale.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Section Points Forts - Fin ***** --> 

<!-- ***** Galerie - Début ***** -->
<section class="section bg-light py-5" id="gallery">
    <div class="container">
      <div class="row text-center mb-5">
        <div class="col-lg-12">
          <h2 class="section-title">Ambiance du Club</h2>
          <p class="section-subtitle">Un aperçu de notre quotidien</p>
        </div>
      </div>
      <div class="d-flex justify-content-center">
        <div class="row g-3 justify-content-center">
          <div class="col-md-4">
            <img src="{{ asset('images/third-trainer.jpg') }}" class="img-fluid rounded" alt="Entraîneur 1">
          </div>
          <div class="col-md-4">
            <img src="{{ asset('images/second-trainer.jpg') }}" class="img-fluid rounded" alt="Entraîneur 2">
          </div>
          <div class="col-md-4">
            <img src="{{ asset('images/first-trainer.jpg') }}" class="img-fluid rounded" alt="Entraîneur 3">
          </div>
        </div>
      </div>      
    </div>
  </section>
<!-- ***** Galerie - Fin ***** -->

<!-- ***** Témoignages - Début ***** -->
<section class="section bg-light py-5" id="testimonials">
    <div class="container">
      <div class="row text-center mb-5">
        <div class="col-lg-12">
          <h2 class="section-title">Témoignages de Membres</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-4">
          <div class="card p-4 shadow-sm">
            <p>"Cette salle m'a donné confiance et des résultats. C'est comme une deuxième maison !"</p>
            <h6 class="mt-3">– Sarah M.</h6>
          </div>
        </div>
        <div class="col-md-6 mb-4">
          <div class="card p-4 shadow-sm">
            <p>"Propre, esthétique et la playlist est toujours au top. 10/10 !"</p>
            <h6 class="mt-3">– Jamal R.</h6>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-4">
          <div class="card p-4 shadow-sm">
            <p>"Les coachs sont incroyables et m'ont aidé à atteindre mes objectifs."</p>
            <h6 class="mt-3">– Thomas L.</h6>
          </div>
        </div>
        <div class="col-md-6 mb-4">
          <div class="card p-4 shadow-sm">
            <p>"L'abonnement premium vaut chaque centime. Accès 24/7 et équipement neuf."</p>
            <h6 class="mt-3">– Élodie P.</h6>
          </div>
        </div>
      </div>
    </div>
</section>
<!-- ***** Témoignages - Fin ***** -->
  
<!-- ***** Appel à l'action - Début ***** -->
<section class="section bg-light py-5" id="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <h2>Ne <em>réfléchissez</em> plus, commencez <em>aujourd'hui</em> !</h2>
                        <p>Rejoignez notre communauté sportive et transformez votre corps et votre esprit. Nos coachs experts vous guideront à chaque étape.</p>
                        <div class="main-button scroll-to-section">
                            @if ($hasMembership)
                                <a href="{{ route('membership.info') }}">Mon Abonnement</a>
                            @else
                                <a href="{{ route('membership') }}">Devenir Membre</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- ***** Appel à l'action - Fin ***** -->