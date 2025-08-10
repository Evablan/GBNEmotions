<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
        <h2>Hola, {{ Auth::user()->name }}, ¿Cómo te sientes hoy?</h2>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="bg-red-500 text-black px-4 py-2 rounded hover:bg-red-600">
                Cerrar sesión
            </button>
        </form>
    </x-slot>

    @if(Auth::user()->isAdmin())
        {{-- Dashboard para Administradores --}}
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <h3 class="text-lg font-semibold mb-4 text-blue-600">
                            🎯 Panel de Administración
                        </h3>
                        <p class="text-gray-600 mb-4">
                            Bienvenido al panel de administración. Aquí puedes acceder a las estadísticas y análisis de emociones.
                        </p>
                        <div class="flex space-x-4">
                            <a href="{{ route('admin.dashboard') }}" 
                               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                📊 Ver Estadísticas
                            </a>
                            <a href="{{ route('dashboard') }}" 
                               class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                🔄 Actualizar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        {{-- Dashboard para Usuarios Regulares --}}
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded">
                    <p class="font-medium">⚠️ Acceso Restringido</p>
                    <p>Esta sección está destinada para administradores. Como usuario regular, no tienes acceso al panel de administración.</p>
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
