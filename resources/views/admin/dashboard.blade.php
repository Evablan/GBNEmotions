<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('admin.panel_title') }}
            </h2>
            <x-language-selector />
        </div>
    </x-slot>

    <div class="py-6 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- ========================================
                 FILA SUPERIOR: Tarjetas de Resumen
            ========================================= -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                
                <!-- Tarjeta 1: Total de Registros -->
                <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl shadow-lg p-4 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-blue-100 text-sm font-medium">{{ __('admin.total_records') }}</p>
                            <p class="text-2xl font-bold">{{ number_format($totalRecords) }}</p>
                        </div>
                        <div class="bg-blue-400 bg-opacity-30 rounded-full p-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta 2: Emociones Positivas -->
                <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-lg p-4 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-green-100 text-sm font-medium">{{ __('admin.positive_emotions') }}</p>
                            <p class="text-2xl font-bold">{{ number_format($percentagePositive, 1) }}%</p>
                            <p class="text-green-100 text-xs">{{ $positiveCount }} {{ __('admin.records') }}</p>
                        </div>
                        <div class="bg-green-400 bg-opacity-30 rounded-full p-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.828 14.828a4 4 0 01-5.656 0M9 10h1m4 0h1m-6 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta 3: Emociones Negativas -->
                <div class="bg-gradient-to-br from-red-500 to-red-600 rounded-xl shadow-lg p-4 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-red-100 text-sm font-medium">{{ __('admin.negative_emotions') }}</p>
                            <p class="text-2xl font-bold">{{ number_format($percentageNegative, 1) }}%</p>
                            <p class="text-red-100 text-xs">{{ $negativeCount }} {{ __('admin.records') }}</p>
                        </div>
                        <div class="bg-red-400 bg-opacity-30 rounded-full p-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 12h6m-6-4h6m2 5.291A7.962 7.962 0 0112 15c-2.34 0-4.29-1.009-5.824-2.263M15 6.3a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <!-- Tarjeta 4: Emociones Neutras -->
                <div class="bg-gradient-to-br from-gray-500 to-gray-600 rounded-xl shadow-lg p-4 text-white">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-100 text-sm font-medium">{{ __('admin.neutral_emotions') }}</p>
                            <p class="text-2xl font-bold">{{ number_format($percentageNeutral, 1) }}%</p>
                            <p class="text-gray-100 text-xs">{{ $neutralCount }} {{ __('admin.records') }}</p>
                        </div>
                        <div class="bg-gray-400 bg-opacity-30 rounded-full p-3">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ========================================
                 FILA MEDIA: 3 Columnas (Filtro + Emociones + Futura)
            ========================================= -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
                
                <!-- Panel 1: Filtro por Departamento (Compacto) -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="p-4">
                        <h3 class="text-base font-semibold text-gray-800 mb-3">
                            🏢 {{ __('admin.department_filter') }}
                        </h3>
                        
                        <form method="GET" action="{{ route('admin.dashboard') }}" class="space-y-3">
                            <div>
                                <label for="department" class="block text-xs font-medium text-gray-700 mb-1">
                                    {{ __('admin.select_department') }}
                                </label>
                                <select name="department" id="department" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 text-sm transition-colors">
                                    <option value="">{{ __('admin.select_option') }}</option>
                                    @foreach($departments as $department)
                                        <option value="{{ $department->id }}" {{ $selectedDepartment == $department->id ? 'selected' : '' }}>
                                            {{ $department->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="flex space-x-2">
                                <button type="submit" class="flex-1 px-3 py-2 bg-gradient-to-r from-indigo-500 to-indigo-600 text-white rounded-lg hover:from-indigo-600 hover:to-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 text-xs font-medium transition-all duration-200 shadow-md">
                                    🔍 {{ __('admin.apply_filter') }}
                                </button>
                                
                                @if($selectedDepartment)
                                    <a href="{{ route('admin.dashboard') }}" class="px-4 py-2 bg-gradient-to-r from-gray-500 to-gray-600 text-white rounded-lg hover:from-gray-600 hover:to-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 text-xs font-medium transition-all duration-200 shadow-md">
                                        🗑️
                                    </a>
                                @endif
                            </div>
                        </form>
                        
                        @if($selectedDepartment)
                            <div class="mt-3 p-2 bg-gradient-to-r from-indigo-50 to-blue-50 border border-indigo-200 rounded-lg">
                                <p class="text-xs text-indigo-800">
                                    <strong>{{ __('admin.department_filter') }}:</strong> 
                                    @foreach($departments as $dept)
                                        @if($dept->id == $selectedDepartment)
                                            <span class="font-semibold">{{ $dept->name }}</span>
                                            @break
                                        @endif
                                    @endforeach
                                </p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Panel 2: Emociones Más Frecuentes (Compacto) -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="p-4">
                        <div class="flex items-center justify-between mb-3">
                            <h3 class="text-base font-semibold text-gray-800">
                                🎯 {{ __('admin.emotions_distribution') }}
                                @if($selectedDepartment)
                                    @foreach($departments as $dept)
                                        @if($dept->id == $selectedDepartment)
                                            <span class="text-xs text-gray-500 font-normal">({{ $dept->name }})</span>
                                            @break
                                        @endif
                                    @endforeach
                                @else
                                    <span class="text-xs text-gray-500 font-normal">({{ __('admin.general_statistics') }})</span>
                                @endif
                            </h3>
                        </div>
                        
                        @if($emotionsToDisplay->count() > 0)
                            <div class="space-y-2">
                                @foreach($emotionsToDisplay->take(4) as $emotion)
                                <div class="flex items-center justify-between p-2 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                    <div class="flex items-center space-x-2">
                                        <span class="text-sm">
                                            @switch($emotion->emotion)
                                                @case('heureux')
                                                    😊
                                                    @break
                                                @case('calme')
                                                    😌
                                                    @break
                                                @case('neutre')
                                                    😐
                                                    @break
                                                @case('frustre')
                                                    😤
                                                    @break
                                                @case('tendu')
                                                    😰
                                                    @break
                                                @default
                                                    🎭
                                            @endswitch
                                        </span>
                                        <span class="text-xs font-medium text-gray-900">
                                            @switch($emotion->emotion)
                                                @case('heureux')
                                                    Heureux
                                                    @break
                                                @case('calme')
                                                    Calme
                                                    @break
                                                @case('neutre')
                                                    Neutre
                                                    @break
                                                @case('frustre')
                                                    Frustré
                                                    @break
                                                @case('tendu')
                                                    Tendu
                                                    @break
                                                @default
                                                    {{ $emotion->emotion }}
                                            @endswitch
                                        </span>
                                    </div>
                                    <div class="flex items-center space-x-2">
                                        <span class="text-xs text-gray-600">{{ number_format($emotion->count) }}</span>
                                        <span class="text-xs font-bold text-gray-900">{{ number_format($emotion->percentage, 1) }}%</span>
                                        <div class="w-16 bg-gray-200 rounded-full h-1.5">
                                            <div class="bg-gradient-to-r from-blue-400 to-blue-500 h-1.5 rounded-full transition-all duration-500" style="width: {{ $emotion->percentage }}%"></div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <div class="text-center py-6">
                                <div class="text-gray-400 text-2xl mb-2">📭</div>
                                <p class="text-xs text-gray-600">
                                    {{ __('admin.no_data') }}
                                </p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Panel 3: Nueva Sección (Placeholder) -->
                <div class="bg-gradient-to-br from-purple-50 to-pink-50 border border-purple-200 rounded-xl shadow-lg overflow-hidden">
                    <div class="p-4">
                        <div class="text-center">
                            <div class="text-purple-500 text-2xl mb-2">🚀</div>
                            <h3 class="text-base font-semibold text-purple-800 mb-2">
                                {{ __('admin.statistics') }}
                            </h3>
                            <p class="text-xs text-purple-600">
                                {{ __('admin.welcome_message') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ========================================
                 FILA INFERIOR: Tendencia + Información
            ========================================= -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                
                <!-- Panel Izquierdo: Gráfico de Tendencia -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-lg font-semibold text-gray-800">
                                📈 {{ __('admin.general_statistics') }}
                            </h3>
                            <div class="flex space-x-2">
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-green-500 rounded-full mr-2"></div>
                                    <span class="text-xs text-gray-600">{{ __('admin.positive_emotions') }}</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-red-500 rounded-full mr-2"></div>
                                    <span class="text-xs text-gray-600">{{ __('admin.negative_emotions') }}</span>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-gray-500 rounded-full mr-2"></div>
                                    <span class="text-xs text-gray-600">{{ __('admin.neutral_emotions') }}</span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="space-y-4">
                            <!-- Barra de emociones positivas -->
                            <div class="flex items-center space-x-3">
                                <div class="w-20 text-sm text-gray-700 font-medium">{{ __('admin.positive_emotions') }}</div>
                                <div class="flex-1 bg-gray-200 rounded-full h-5">
                                    <div class="bg-gradient-to-r from-green-400 to-green-500 h-5 rounded-full transition-all duration-500" style="width: {{ $percentagePositive }}%"></div>
                                </div>
                                <div class="w-16 text-sm font-bold text-gray-900 text-right">{{ number_format($percentagePositive, 1) }}%</div>
                            </div>
                            
                            <!-- Barra de emociones negativas -->
                            <div class="flex items-center space-x-3">
                                <div class="w-20 text-sm text-gray-700 font-medium">{{ __('admin.negative_emotions') }}</div>
                                <div class="flex-1 bg-gray-200 rounded-full h-5">
                                    <div class="bg-gradient-to-r from-red-400 to-red-500 h-5 rounded-full transition-all duration-500" style="width: {{ $percentageNegative }}%"></div>
                                </div>
                                <div class="w-16 text-sm font-bold text-gray-900 text-right">{{ number_format($percentageNegative, 1) }}%</div>
                            </div>
                            
                            <!-- Barra de emociones neutras -->
                            <div class="flex items-center space-x-3">
                                <div class="w-20 text-sm text-gray-700 font-medium">{{ __('admin.neutral_emotions') }}</div>
                                <div class="flex-1 bg-gray-200 rounded-full h-5">
                                    <div class="bg-gradient-to-r from-gray-400 to-gray-500 h-5 rounded-full transition-all duration-500" style="width: {{ $percentageNeutral }}%"></div>
                                </div>
                                <div class="w-16 text-sm font-bold text-gray-900 text-right">{{ number_format($percentageNeutral, 1) }}%</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Panel Derecho: Información del Sistema (Compacta) -->
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4">
                            ℹ️ Información del Sistema
                        </h3>
                        
                        <div class="space-y-3">
                            <div class="flex items-center p-3 bg-blue-50 rounded-lg">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-blue-800">
                                        Panel de estadísticas agregadas y anónimas
                                    </p>
                                    <p class="text-xs text-blue-600 mt-1">
                                        Basado en {{ number_format($totalRecords) }} registros emocionales
                                    </p>
                                </div>
                            </div>
                            
                            <div class="flex items-center p-3 bg-green-50 rounded-lg">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-green-800">
                                        Sistema de filtrado por departamentos
                                    </p>
                                    <p class="text-xs text-green-600 mt-1">
                                        {{ $departments->count() }} departamentos disponibles
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ========================================
                 FILA EXTRA: Futuro Mapa de Calor
            ========================================= -->
            <div class="bg-gradient-to-r from-purple-50 to-pink-50 border border-purple-200 rounded-xl p-6">
                <div class="text-center">
                    <div class="text-purple-500 text-3xl mb-3">🔥</div>
                    <h3 class="text-lg font-semibold text-purple-800 mb-2">
                        Mapa de Calor - Próximamente
                    </h3>
                    <p class="text-sm text-purple-600">
                        Visualización avanzada de patrones emocionales por departamento y tiempo
                    </p>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
