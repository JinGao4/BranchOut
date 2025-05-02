<nav class="navbar navbar-expand-md navbar-dark bg-dark shadow-sm">
    <div class="container">
        <!-- Links for Companies and Campaigns -->
        <div class="ms-auto d-flex">
        <a class="navbar-text text-white ms-3 text-decoration-none" href="{{ route('dashboard') }}">
                {{ __('Home') }}
            </a>
            <a class="navbar-text text-white ms-3 text-decoration-none" href="{{ route('companies.index') }}">
                {{ __('Companies') }}
            </a>
            <a class="navbar-text text-white ms-3 text-decoration-none" href="{{ route('campaigns.index') }}">
                {{ __('Campaigns') }}
            </a>
        </div>

        <!-- Centered Brand with Logo -->
        <div class="d-flex w-100 justify-content-center">
            <a class="navbar-brand text-center text-decoration-none fw-bold d-flex align-items-center" href="{{ route('dashboard') }}">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" style="height: 30px;" class="me-2">
                {{ __('BranchOut') }}
            </a>
        </div>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Search Icon -->
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li>
                <!-- Authentication Links -->
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-decoration-none" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item text-decoration-none" href="{{ route('profile.edit') }}">
                            {{ __('Profile') }}
                        </a>
                        <a class="dropdown-item text-decoration-none" href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Log Out') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
