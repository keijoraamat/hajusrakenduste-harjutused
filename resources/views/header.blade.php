            @if (Route::has('login'))
                <div class="p-3">
                <a href="{{ url('/') }}">Algus</a>
                <a href="{{ url('/weather') }}">Hetke ilm</a>
                <a href="{{ url('/map') }}">Kaart</a>
                <a href="{{ url('/api') }}">API</a>
                <a href="{{ url('/store') }}">Ostukorv</a>
                    @auth
                        <a href="{{ url('/logout') }}">Logi välja</a>
                    @else
                        <a href="{{ route('login') }}">Logi sisse</a>
                    @endauth
                </div>
            @endif
