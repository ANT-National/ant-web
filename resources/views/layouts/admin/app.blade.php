<x-main-layout :title="$title" class="--font-inter bg-gray-50 font-inter tracking-tight text-gray-900 antialiased scroll-smooth">
    <div class="flex min-h-screen flex-col overflow-hidden supports-[overflow:clip]:overflow-clip"
         x-data="{ isLoading: true }" x-init="window.onload = () => { isLoading = false }">
        <div x-show="isLoading" class="fixed inset-0 flex items-center justify-center bg-white z-50">
            <div class="flex-col gap-4 w-full flex items-center justify-center">
                <x-application-icon class="animate-ping w-24 h-24"/>
            </div>
        </div>
        <main class="grow" x-show="!isLoading">
            {{ $slot }}
        </main>
    </div>
</x-main-layout>
