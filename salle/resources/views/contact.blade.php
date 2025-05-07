@extends('layouts.app')

@section('title', 'Contact')

@section('content')
<div class="main-banner" id="top">
    <div class="video-overlay header-text">
    </div>
</div>
{{-- ✨ Page Heading --}}
<div class="page-heading" style="background: url('/images/contact-bg.jpg') no-repeat center center; background-size: cover; padding: 100px 0;">
    <div class="container text-center text-white">
        <h1 class="display-4 fw-bold">Contact Us</h1>
        <p class="lead">We're here to help. Send us a message!</p>
    </div>
</div>

{{-- 📬 Contact Section --}}
<section class="section" id="contact-us">
    <div class="container">
        <div class="row g-4 align-items-stretch">
            
            {{-- 🗺️ Google Map --}}
            <div class="col-lg-6 wow fadeInLeft" data-wow-delay="0.2s">
                <div class="map-container shadow rounded overflow-hidden">
                    <iframe src="https://maps.google.com/maps?q=Nouakchott,+Mauritania&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="500px" frameborder="0" style="border:0;" allowfullscreen></iframe>
                </div>
            </div>

            {{-- 📝 Contact Form --}}
            <div class="col-lg-6 wow fadeInRight" data-wow-delay="0.4s">
                <div class="contact-form bg-white p-5 shadow rounded">
                    <h4 class="mb-4">Send us a message</h4>
                    <form id="contact" action="" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input name="name" type="text" class="form-control" placeholder="Your Name*" required>
                        </div>
                        <div class="mb-3">
                            <input name="email" type="email" class="form-control" placeholder="Your Email*" required>
                        </div>
                        <div class="mb-3">
                            <input name="subject" type="text" class="form-control" placeholder="Subject">
                        </div>
                        <div class="mb-3">
                            <textarea name="message" rows="5" class="form-control" placeholder="Message" required></textarea>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
