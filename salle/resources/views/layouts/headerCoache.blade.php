<!-- ***** Zone d'en-tête - Début ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo - Début ***** -->
                    <a href="{{ url('/coach/index') }}" class="logo">Coache<em> Panel</em></a>
                    <!-- ***** Logo - Fin ***** -->

                    <!-- ***** Menu - Début ***** -->
                    <ul class="nav">
                        <li><a href="{{ url('/coach/cours') }}">Mes Cours</a></li>
                        <li><a href="{{ url('/coach/planning/hebdomadaire') }}">Mes Séances</a></li>
                        {{-- <li><a href="{{ url('/coach/membres') }}">Mes Membres</a></li> --}}
                        <li><a href="{{ url('/coache/contact') }}">Messages</a></li>

                        @auth
                            <li class="main-button">
                                <a href="{{ route('profile.edit') }}">Profil</a>
                            </li>
                        @endauth
                    </ul>

                    <a class="menu-trigger">
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu - Fin ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Zone d'en-tête - Fin ***** -->
