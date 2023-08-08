@if (auth()->user())
    <li class="nav-item"><a href="index.html">
        </a><a class="nav-link" href="{{ route('register') }}">Buat Laporan</a>
    </li>
    <li class="nav-item"><a href="index.html">
        </a><a class="nav-link" href="{{ route('login') }}">Masuk</a>
    </li>
@else
    <li class="nav-item"><a href="index.html">
        </a><a class="nav-link" href="{{ route('register') }}">Daftar</a>
    </li>
    <li class="nav-item"><a href="index.html">
        </a><a class="nav-link" href="{{ route('login') }}">Masuk</a>
    </li>
@endif
