<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('dashboard') }}">
                <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                <span class="menu-title">{{ __('Dashboard') }}</span>
            </a>
            <a class="nav-link" href="{{ route('halaman.index') }}">
                <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                <span class="menu-title">{{ __('Halaman') }}</span>
            </a>
        </li>
    </ul>
</nav>
