<header>
    <nav id="navbar" class="container navbar px-3 ">

        <a id="brand" href="{{ route('client.index') }}" style="font-size: 30px;" >Playfest</a>
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
                    <ul class="dropdown-menu ">
                        <li><a class="dropdown-item text-dark" href="{{route('client.profile')}}">Profile</a></li>
                        <li><a class="dropdown-item text-dark" href="{{route('client.pemesanan')}}">Transaction</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
                                    class="dropdown-item text-dark"> Logout </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                        </li>

                    </ul>
                </li>
            @endauth

        </ul>
    </nav>

</header>
