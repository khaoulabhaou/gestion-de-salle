@extends('layouts.app')
<!-- ***** Main Banner Area Start ***** -->
<div class="main-banner" id="top">
    <video autoplay muted loop id="bg-video">
        <source src="{{ asset('images/gym-video.mp4') }}" type="video/mp4" />
    </video>
    <div class="video-overlay header-text">
        <div class="caption">
            <h6>work harder, get stronger</h6>
            <h2>easy with our <em>gym</em></h2>
            <div class="main-button scroll-to-section">
                <a href="{{ route('membership') }}">Become a member</a>
            </div>
        </div>
    </div>
</div>
<!-- ***** Main Banner Area End ***** -->

<!-- ***** Gym Highlights Section Start ***** -->
<section class="section bg-light py-5" id="highlights">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col-lg-12">
                <h2 class="section-title">Why Choose Us</h2>
                <p class="section-subtitle">Boost your goals with our space, gear, and vibe</p>
            </div>
        </div>
        <div class="row">
            <!-- Card 1 -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100 text-center p-4">
                    <i class="fa fa-dumbbell fa-3x text-danger mb-3"></i>
                    <h5 class="card-title">Top Equipment</h5>
                    <p class="card-text">Train with the latest gym gear and machines, ready for all levels.</p>
                </div>
            </div>
            <!-- Card 2 -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100 text-center p-4">
                    <i class="fa fa-fire fa-3x text-warning mb-3"></i>
                    <h5 class="card-title">Intense Vibes</h5>
                    <p class="card-text">The energy here hits different. Music, lights, and real motivation.</p>
                </div>
            </div>
            <!-- Card 3 -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm h-100 text-center p-4">
                    <i class="fa fa-heartbeat fa-3x text-success mb-3"></i>
                    <h5 class="card-title">Wellness First</h5>
                    <p class="card-text">From lifting to recovery, we’ve got your full health in mind.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ***** Gym Highlights Section End ***** --> 

<!-- ***** Gym Gallery Start ***** -->
<section class="section bg-light py-5" id="gallery">
    <div class="container">
      <div class="row text-center mb-5">
        <div class="col-lg-12">
          <h2 class="section-title">Gym Vibes</h2>
          <p class="section-subtitle">A peek into our daily grind</p>
        </div>
      </div>
      <div class="d-flex justify-content-center">
        <div class="row g-3 justify-content-center">
          <div class="col-md-4">
            <img src="{{ asset('images/third-trainer.jpg') }}" class="img-fluid rounded" alt="">
          </div>
          <div class="col-md-4">
            <img src="{{ asset('images/second-trainer.jpg') }}" class="img-fluid rounded" alt="">
          </div>
          <div class="col-md-4">
            <img src="{{ asset('images/first-trainer.jpg') }}" class="img-fluid rounded" alt="">
          </div>
        </div>
      </div>      
    </div>
  </section>
<!-- ***** Gym Gallery End ***** -->

<!-- ***** Testimonials Start ***** -->
<section class="section bg-light py-5" id="testimonials">
    <div class="container">
      <div class="row text-center mb-5">
        <div class="col-lg-12">
          <h2 class="section-title">What Members Say</h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-4">
          <div class="card p-4 shadow-sm">
            <p>"This gym gave me confidence and results. Literally my second home!"</p>
            <h6 class="mt-3">– Sarah M.</h6>
          </div>
        </div>
        <div class="col-md-6 mb-4">
          <div class="card p-4 shadow-sm">
            <p>"Clean, aesthetic, and the playlist is always fire. 10/10!"</p>
            <h6 class="mt-3">– Jamal R.</h6>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-4">
          <div class="card p-4 shadow-sm">
            <p>"This gym gave me confidence and results. Literally my second home!"</p>
            <h6 class="mt-3">– Sarah M.</h6>
          </div>
        </div>
        <div class="col-md-6 mb-4">
          <div class="card p-4 shadow-sm">
            <p>"Clean, aesthetic, and the playlist is always fire. 10/10!"</p>
            <h6 class="mt-3">– Jamal R.</h6>
          </div>
        </div>
      </div>
    </div>
</section>
<!-- ***** Testimonials End ***** -->
  
<!-- ***** Pricing Plans Start ***** -->
<section class="section bg-light py-5" id="pricing">
    <div class="container">
      <div class="row text-center mb-5">
        <div class="col-lg-12">
          <h2 class="section-title">Membership Plans</h2>
          <p class="section-subtitle">Pick what fits your grind</p>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-4 mb-4">
          <div class="card p-4 shadow-sm">
            <h4>Basic</h4>
            <p class="text-muted">Just the essentials</p>
            <h3>$19/mo</h3>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card p-4 shadow-sm bg-dark text-white">
            <h4>Standard</h4>
            <p class="text-muted">Best for most people</p>
            <h3>$29/mo</h3>
          </div>
        </div>
        <div class="col-md-4 mb-4">
          <div class="card p-4 shadow-sm">
            <h4>Premium</h4>
            <p class="text-muted">All access + perks</p>
            <h3>$39/mo</h3>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- ***** Pricing Plans End ***** -->
  
  
<!-- ***** Call to Action Start ***** -->
<section class="section bg-light py-5" id="call-to-action">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <h2>Don't <em>think</em>, begin <em>today</em>!</h2>
                        <p>Ut consectetur, metus sit amet aliquet placerat, enim est ultricies ligula, sit amet dapibus odio augue eget libero. Morbi tempus mauris a nisi luctus imperdiet.</p>
                        <div class="main-button scroll-to-section">
                            <a href="{{ route('membership') }}">Become a member</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<!-- ***** Call to Action End ***** -->