<!-- ***** Zone d'en-tête - Début ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo - Début ***** -->
                    <a href="{{ url('/admin/dashboard') }}" class="logo">Admin<em> Panel</em></a>
                    <!-- ***** Logo - Fin ***** -->

                    <!-- ***** Menu - Début ***** -->
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="{{ url('/coache/coache-list') }}">Entraînreurs</a></li>
                        <li class="scroll-to-section"><a href="{{ url('/cours/list-cours') }}">Cours</a></li>
                        <li class="scroll-to-section"><a href="{{ url('/membership/list-membership') }}">Memberships</a></li>
                        <li class="scroll-to-section"><a href="{{ url('/membres/list-membre') }}">Membres</a></li>
                        <li class="scroll-to-section"><a href="{{ url('/admin/messages') }}">Messages</a></li>  

                        @auth
                            <li class="main-button">
                                <a href="{{ route('profile.edit') }}">Profil</a>
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
