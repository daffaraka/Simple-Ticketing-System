<aside
    class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 shadow-lg"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href=" {{ route('client.index') }} ">
            <img src="{{ asset('new argon/assets/img/logo-ct-dark.png') }}" class="navbar-brand-img h-100"
                alt="main_logo">
            <span class="ms-1 font-weight-bold">Playing Fest</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse h-100  w-auto " id="sidenav-collapse-main">
        {{-- Navigasi bar --}}


        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->is(['dashboard']) ? 'active fw-bold' : '' }} "
                    href="{{ route('dashboard') }}">
                    <div
                        class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>

            @if (auth()->user()->hasRole('admin'))
                <li class="nav-item">
                    <a class="nav-link {{ request()->is(['dashboard/artist', 'dashboard/artist/create']) ? 'active fw-bold' : '' }}"
                        href="{{ route('artist.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-calendar-grid-58 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Artist</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is(['dashboard/venues', 'dashboard/venues/create']) ? 'active fw-bold' : '' }}"
                        href="{{ route('venues.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-world text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Venue</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is(['dashboard/ticket']) ? 'active fw-bold' : '' }}"
                        href="{{ route('ticket.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Ticket</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('dashboard/order') ? 'active fw-bold' : '' }}"
                        href="{{ route('order.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-cart text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Order</span>
                    </a>
                </li>
                <hr class="horizontal dark mt-0">
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('dashboard/user') ? 'active fw-bold' : '' }}"
                        href="{{ route('user.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">User Management</span>
                    </a>
                </li>
                {{-- <li class="nav-item">
              <a class="nav-link " href="{{route('role.index')}}">
                <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                  <i class="ni ni-laptop text-success text-sm opacity-10"></i>
                </div>
                <span class="nav-link-text ms-1">Roles Management</span>
              </a>
            </li> --}}
             
            @elseif (auth()->user()->hasRole('EO'))
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('dashboard/eo/ticket-management') ? 'active fw-bold' : '' }}"
                        href="{{ route('eo.ticket.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Your Ticket</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('dashboard/eo/order') ? 'active fw-bold' : '' }}"
                        href="{{ route('eo.order.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-cart text-primary text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Order</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('dashboard/eo/NIB') ? 'active fw-bold' : '' }}"
                        href="{{ route('eo.nib.index') }}">
                        <div
                            class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-collection text-danger text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Data NIB</span>
                    </a>
                </li>
            @endif





        </ul>
    </div>
    {{-- </li>
        <li class="nav-item">
          <a class="nav-link " href="./pages/virtual-reality.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-app text-info text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Virtual Reality</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="./pages/rtl.html">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-world-2 text-danger text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">RTL</span>
          </a>
        </li> --}}




</aside>
