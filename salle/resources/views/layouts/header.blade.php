<!-- ***** Zone d'en-tête - Début ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
<nav class="main-nav position-relative">
    <!-- Logo -->
    <a href="{{ url('/') }}" class="logo">Training<em> Studio</em></a>

    <!-- Menu trigger (only visible on mobile) -->
    <a id="menuTrigger" class="menu-trigger d-md-none">
        <span>Menu</span>
    </a>

    <!-- Nav items -->
    <ul class="nav d-md-flex" id="navCollapse">
        <li class="scroll-to-section"><a href="{{ url('') }}">Accueil</a></li>
        <li class="scroll-to-section"><a href="{{ url('about') }}">À propos</a></li>
        <li class="scroll-to-section"><a href="{{ url('classes') }}">Cours</a></li>
        <li class="scroll-to-section"><a href="{{ url('schedules') }}">Horaires</a></li>
        <li class="scroll-to-section"><a href="{{ url('contact') }}">Contact</a></li>
        @guest
            <li class="main-button"><a href="{{ route('register') }}">S'inscrire</a></li>
        @endguest
        @auth
            <li class="main-button"><a href="{{ route('profile.edit') }}">Profil</a></li>
        @endauth
    </ul>
</nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Zone d'en-tête - Fin ***** -->