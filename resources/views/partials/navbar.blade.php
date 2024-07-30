<!-- Navbar -->
<nav class="navbar navbar-expand-lg " style="margin-top: 20px;">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img class="me-3 logo" src="{{ asset('image/logo.png') }}" alt="Logo" />
            <div class="d-sm-block d-none">
                <p class="mb-0">Universitas</p>
                <h5 class="fw-bold">Sultan Ageng Tirtayasa</h5>
            </div>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div class="navbar-card">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link " href="/frontoffice/beranda">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/frontoffice/statistic">Statistic</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/frontoffice/untirta-karir">Untirta Karir</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/frontoffice/tracer-study">Tracer Study</a>
                    </li>
                </ul>
            </div>
            <ul class="navbar-nav ms-5">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ Auth::user()->profile_photo_url }}" class="rounded-circle profile-pic" alt="Profile Picture">
                        <span class="profile-name">{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="/frontoffice/profile">Profile</a></li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST" style="display: none;" id="logout-form">
                                @csrf
                            </form>
                            <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
