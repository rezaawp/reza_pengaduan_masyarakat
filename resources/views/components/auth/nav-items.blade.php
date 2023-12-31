@if (auth()->user() &&
        auth()->user()->can('menulis laporan pengaduan'))
    <li class="nav-item"><a href="index.html">
        </a><a class="nav-link" href="{{ route('laporan.create') }}">{{ __('Make a report') }}</a>
    </li>
    <li class="nav-item"><a href="index.html">
        </a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button style="background-color: transparent" class="nav-link"
                href="{{ route('login') }}">{{ __('Log out') }}</button>
        </form>
    </li>
@elseif(auth()->user() &&
        !auth()->user()->hasRole('masyarakat'))
<li class="nav-item"><a class="nav-link" href="{{ route('admin.laporan.index') }}">{{ __('Name') }} :
            {{ auth()->user()->name }}</a>
    </li>
    <li class="nav-item">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button style="background-color: transparent" class="nav-link"
                href="{{ route('login') }}">{{ __('Log out') }}</button>
        </form>

    </li>
@else
    <li class="nav-item"><a href="index.html">
        </a><a class="nav-link" href="{{ route('register') }}">Daftar</a>
    </li>
    <li class="nav-item"><a href="index.html">
        </a><a class="nav-link" href="{{ route('login') }}">Masuk</a>
    </li>
@endif
