<style>
    .light {
        background-color: #fafbfc
    }
</style>
<nav class="navbar shadow-sm navbar-expand-lg light" id="navbar_top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('user.home') }}">E-Lapor</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

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

<script>
    document.addEventListener("DOMContentLoaded", function() {
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                document.getElementById('navbar_top').classList.add('fixed-top');
                // add padding top to show content behind navbar
            } else {
                document.getElementById('navbar_top').classList.remove('fixed-top');
                // remove padding top from body
                // document.body.style.paddingTop = '0';
            }
        });
    });
</script>
