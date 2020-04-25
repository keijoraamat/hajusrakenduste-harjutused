            @if (Route::has('login'))
                <div class="top-right links">
                <a href="{{ url('/weather') }}">1, hetke ilm</a>
                <a href="{{ url('/map') }}">2, kaart</a>
                    @auth
                        <a href="{{ url('/') }}">Algus</a>
                        <a href="{{ url('/logout') }}">Logi välja</a>
                    @else
                        <a href="{{ route('login') }}">Logi sisse</a>
                    @endauth
                </div>
            @endif
