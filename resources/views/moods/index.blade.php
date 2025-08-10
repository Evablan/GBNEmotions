{{-- resources/views/moods/index.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Historial de Employee IDs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-4">Historial de Employee IDs</h1>
                    <ul class="space-y-2">
                        @foreach($data as $uid)
                        <li class="p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                            <a href="{{ route('moods.create', ['employee_id' => $uid]) }}" 
                               class="text-blue-600 hover:text-blue-800 font-medium">
                                {{ $uid }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
