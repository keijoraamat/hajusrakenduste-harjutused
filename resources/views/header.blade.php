            @if (Route::has('login'))
                <div>
                <a href="{{ url('/weather') }}">Hetke ilm</a>
                <a href="{{ url('/map') }}">Kaart</a>
                <a href="{{ url('/bread') }}">API</a>
                    @auth
                        <a href="{{ url('/') }}">Algus</a>
                        <a href="{{ url('/logout') }}">Logi välja</a>
                    @else
                        <a href="{{ route('login') }}">Logi sisse</a>
                    @endauth
                </div>
            @endif
