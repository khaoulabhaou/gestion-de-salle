    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="{{ url('/') }}" class="logo">Training<em> Studio</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="{{ url('') }}">Home</a></li>
                            <li class="scroll-to-section"><a href="{{ url('about') }}">About</a></li>
                            <li class="scroll-to-section"><a href="{{ url('classes') }}">Classes</a></li>
                            <li class="scroll-to-section"><a href="{{ url('schedules') }}">Schedules</a></li>
                            <li class="scroll-to-section"><a href="{{ url('contact') }}">Contact</a></li> 
                            <li class="main-button"><a href="{{ route('register') }}">Sign Up</a></li>
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->