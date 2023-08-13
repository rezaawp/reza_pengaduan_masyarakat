<x-guest-layout :title="$code">
    <div class="page page-center">
        <div class="container-tight py-4">
            <div class="empty">
                <div class="empty-header">{{ $code }}</div>
                <p class="empty-title">{{ $message }}</p>
                <p class="empty-subtitle text-muted">
                    {{ isset($message1) ? $message1 : "" }}
                </p>
                <div class="empty-action">
                    <a href="{{ route('user.home') }}" class="btn btn-primary">
                        <!-- Download SVG icon from http://tabler-icons.io/i/arrow-left -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <line x1="5" y1="12" x2="19" y2="12"></line>
                            <line x1="5" y1="12" x2="11" y2="18"></line>
                            <line x1="5" y1="12" x2="11" y2="6"></line>
                        </svg>
                        {{ __('Home') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
