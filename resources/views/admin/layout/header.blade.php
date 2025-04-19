<header>
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
    <nav class="navbar navbar-expand navbar-light navbar-top">
        <div class="container-fluid">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Library</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Data</li>
                </ol>
            </nav>
            <a href="#" class="burger-btn d-block">
            </a>
            <div class="dropdown">
                <a href="#" data-bs-toggle="dropdown" aria-expanded="false" class="">
                    <div class="user-menu d-flex">
                        <div class="user-name text-end me-3">
                            <h6 class="mb-0 text-gray-600">{{ $user->nama }}</h6>
                            <p class="mb-0 text-sm text-gray-600">{{ $user->role }}</p>
                        </div>
                        <div class="user-img d-flex align-items-center">
                            <div class="avatar avatar-md">
                                @if ($user->foto)
                                    <img src="{{ asset('storage/' . $user->foto) }}">
                                @else
                                    <img src="{{ asset('assets/compiled/jpg/banana.jpg') }}">
                                @endif
                            </div>
                        </div>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                    <li>
                        <h6 class="dropdown-header">Hello, {{ $user->nama }}!</h6>
                    </li>
                    <li><a class="dropdown-item" href="{{ route('admin.pengProfile') }}"><i class="icon-mid bi bi-person me-2"></i> Profil Saya</a></li>
                    <li><a class="dropdown-item" href="{{ route('admin.edit') }}"><i class="icon-mid bi bi-gear me-2"></i> Edit Profil</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="icon-mid bi bi-box-arrow-left me-2"></i> Logout
                        </a>
                    
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                    
                </ul>
            </div>
        </div>
    </nav>
</header>