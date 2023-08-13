<nav class="navbar shadow-sm navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">E-Lapor</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ url()->full() == route('user.home') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('user.home') }}">{{ __('Home') }}</a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link {{ url()->full() == route('laporan.create') ? 'active' : '' }}"
                        href="{{ route('laporan.create') }}">{{ __('Create Report') }}</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ url()->full() == route('laporan.index') ? 'active' : '' }}"
                        href="{{ route('laporan.index') }}">{{ __('My Report') }}</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
