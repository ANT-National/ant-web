<footer>
    <div class="mx-auto max-w-6xl px-4 sm:px-6">
        {{-- Top area: Blocks --}}
        <div class="grid gap-10 py-8 sm:grid-cols-12 md:py-12 border-t [border-image:linear-gradient(to_right,transparent,theme(colors.slate.200),transparent)1] ">
            {{-- 1st block --}}
            <div class="space-y-2 sm:col-span-12 lg:col-span-4">
                <div>
                    <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
                </div>
                <div class="text-sm text-gray-600">
                    &copy; associationant.tn - All rights reserved.
                </div>
            </div>

            {{-- 2nd block --}}
            <div class="space-y-2 sm:col-span-6 md:col-span-3 lg:col-span-2">

            </div>

            {{-- 3rd block --}}
            <div class="space-y-2 sm:col-span-6 md:col-span-3 lg:col-span-2">
                <h3 class="text-sm font-medium">Association</h3>
                <ul class="space-y-2 text-sm">
                    <li><a class="text-gray-600 transition hover:text-gray-900" href="#0">About us</a></li>
                </ul>
            </div>

            {{-- 4th block --}}
            <div class="space-y-2 sm:col-span-6 md:col-span-3 lg:col-span-2">
                <h3 class="text-sm font-medium">Resources</h3>
                <ul class="space-y-2 text-sm">
                    <li><a class="text-gray-600 transition hover:text-gray-900" href="#0">Terms of service</a></li>
                </ul>
            </div>

            {{-- 5th block --}}
            <div class="space-y-2 sm:col-span-6 md:col-span-3 lg:col-span-2">
                <h3 class="text-sm font-medium">Social</h3>
                <ul class="flex gap-2">
                    <li>
                        <a class="flex items-center justify-center text-primary transition hover:text-cyan-600 text-xl" href="#0" aria-label="Twitter">
                            <i class="fa-brands fa-square-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center justify-center text-primary transition hover:text-cyan-600 text-xl" href="#0" aria-label="Medium">
                            <i class="fa-brands fa-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a class="flex items-center justify-center text-primary transition hover:text-cyan-600 text-xl" href="#0" aria-label="Github">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    {{-- Big text --}}
    <div class="relative -mt-16 h-60 w-full" aria-hidden="true">
        <div class="pointer-events-none absolute left-1/2 -z-10 -translate-x-1/2 text-center text-[348px] font-bold leading-none before:bg-gradient-to-b before:from-gray-200 before:to-gray-100/30 before:to-80% before:bg-clip-text before:text-transparent before:content-['ANT'] after:absolute after:inset-0 after:bg-gray-300/70 after:bg-clip-text after:text-transparent after:mix-blend-darken after:content-['ANT'] after:[text-shadow:0_1px_0_white]"></div>
        {{-- Glow --}}
        <div class="absolute bottom-0 left-1/2 -translate-x-1/2 translate-y-2/3" aria-hidden="true">
            <div class="h-56 w-56 rounded-full border-[20px] border-blue-700 blur-[80px]"></div>
        </div>
    </div>
</footer>

