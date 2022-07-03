<header class="bg-dark" style="font-size: 24px;">
    <nav id="navbar" class="container navbar px-3 ">

        <a class="navbar-brand" href="{{ route('client.index') }}" style="font-size:28px;">Widya F</a>
        <ul class="nav nav-pills">
            {{-- <li class="nav-item">
            <a class="nav-link" href="#scrollspyHeading1">First</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#scrollspyHeading2">Second</a>
          </li> --}}
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">Login</a>
                </li>
            @endguest

            @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                        aria-expanded="false">{{ Auth::user()->name }}</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{route('client.profile')}}">Update Profile</a></li>
                        <li><a class="dropdown-item" href="{{route('client.pemesanan')}}">Transaction</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <button type="submit">
                                    {{ __('Log Out') }}
                                </button>
                            </form>
                        </li>

                    </ul>
                </li>
            @endauth

        </ul>
    </nav>

</header>
