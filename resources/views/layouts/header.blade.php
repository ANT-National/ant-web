<header class="fixed top-2 z-30 w-full md:top-6">
    <div class="mx-auto max-w-6xl px-4 sm:px-6">
        <div class="relative flex h-14 items-center justify-between gap-3 rounded-2xl bg-white/90 px-3 shadow-lg shadow-black/[0.03] backdrop-blur-sm before:pointer-events-none before:absolute before:inset-0 before:rounded-[inherit] before:border before:border-transparent before:[background:linear-gradient(theme(colors.gray.100),theme(colors.gray.200))_border-box] before:[mask-composite:exclude_!important] before:[mask:linear-gradient(white_0_0)_padding-box,_linear-gradient(white_0_0)]">
            {{-- Site branding --}}
            <div class="flex flex-1 items-center">
                {{-- Include your logo component here --}}
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </div>

            {{-- Desktop sign in links --}}
            <ul class="flex flex-1 items-center justify-end gap-3">
                <li>
                    <a href="{{ route('login') }}" class="btn-sm bg-white text-gray-800 shadow hover:bg-gray-50">
                        Login
                    </a>
                </li>
                <li>
                    <a href="{{ route('register') }}" class="btn-sm bg-gray-800 text-gray-200 shadow hover:bg-gray-900">
                        Register
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>

{{-- Add scroll detection JavaScript --}}
@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let top = true;

            function scrollHandler() {
                if (window.pageYOffset > 10) {
                    top = false;
                    document.querySelector('header').classList.add('scrolled');
                } else {
                    top = true;
                    document.querySelector('header').classList.remove('scrolled');
                }
            }

            scrollHandler();
            window.addEventListener('scroll', scrollHandler);

            window.addEventListener('beforeunload', function () {
                window.removeEventListener('scroll', scrollHandler);
            });
        });
    </script>
@endpush
