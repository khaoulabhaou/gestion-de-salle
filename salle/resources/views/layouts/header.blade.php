<!-- ***** Zone d'en-tête - Début ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo - Début ***** -->
                    <a href="{{ url('/') }}" class="logo">Training<em> Studio</em></a>
                    <!-- ***** Logo - Fin ***** -->
                    <!-- ***** Menu - Début ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="{{ url('') }}">Accueil</a></li>
                        <li class="scroll-to-section"><a href="{{ url('about') }}">À propos</a></li>
                        <li class="scroll-to-section"><a href="{{ url('classes') }}">Cours</a></li>
                        <li class="scroll-to-section"><a href="{{ url('schedules') }}">Horaires</a></li>
                        <li class="scroll-to-section"><a href="{{ url('contact') }}">Contact</a></li>
                        @guest
                            <li class="main-button"><a href="{{ route('register') }}">S'inscrire</a></li>
                        @endguest
                        
                        @auth
                            <li class="main-button">
                                <a href="{{ route('profile.edit') }}">
                                    Profil
                                </a>
                                <form action=""></form>
                            </li>
                        @endauth
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu - Fin ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Zone d'en-tête - Fin ***** -->