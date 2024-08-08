<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $event->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-xl font-bold mb-4">{{ $event->title }}</h3>
                    <p>{{ $event->description }}</p>
                    <p class="text-gray-600 dark:text-gray-400">{{ $event->date }}</p>
                    @if ($event->price == 0)
                    <p>free</p>
                    @else

                   <p>  {{$event->price}} dt</p>
                    @endif
                </div>
            </div>

            <div class="mt-6">
                <form action="{{ route('events.participate', ['id' => $event->id, 'user' => Auth::user()->id]) }}" method="POST">
                    @csrf
                    <!-- Autres champs de formulaire si nécessaire -->
                    <button type="submit" class="btn bg-green-500 text-white rounded px-4 py-2">
                        {{ __("Participate") }}
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
