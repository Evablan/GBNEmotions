<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>{{ __('moods.title') }}</title>
  @vite(['resources/css/app.css'])
</head>
<body class="bg-gray-50 min-h-screen font-sans p-6">
  @include('components.language-selector')
  <div class="max-w-2xl md:max-w-6xl lg:max-w-4xl mx-auto">
    <h1 class="text-2xl md:text-4xl lg:text-3xl font-bold text-center mb-6 md:mb-8">
      {{ __('moods.header', ['employee_id' => $employee_id]) }}
    </h1>

    {{-- Saludo personalizado según la hora --}}
    <div class="text-center mb-4 md:mb-6">
      <p class="text-base md:text-xl lg:text-lg text-gray-600" id="greeting">
        @php
          $hour = now()->hour;
          if ($hour >= 5 && $hour < 12) {
            echo '🌅 Bonjour! Comment allez-vous ce matin?';
          } elseif ($hour >= 12 && $hour < 17) {
            echo '☀️ Bon après-midi! Comment se passe votre journée?';
          } elseif ($hour >= 17 && $hour < 21) {
            echo '🌆 Bonsoir! Comment s\'est passée votre journée?';
          } else {
            echo '🌙 Bonne nuit! Comment vous sentez-vous?';
          }
        @endphp
      </p>
    </div>

    {{-- Indicador de progreso --}}
    <div class="flex justify-center mb-6 md:mb-8">
      <div class="flex items-center space-x-2 md:space-x-6 lg:space-x-4">
        <div class="flex items-center">
          <div class="w-6 h-6 md:w-10 md:h-10 lg:w-8 lg:h-8 bg-primary text-white rounded-full flex items-center justify-center font-semibold transition-all duration-300 text-xs md:text-lg lg:text-sm" id="step-1">1</div>
          <span class="ml-1 md:ml-3 lg:ml-2 text-xs md:text-lg lg:text-sm font-medium text-gray-600">Sélection d'émotion</span>
        </div>
        <div class="w-8 md:w-16 lg:w-12 h-0.5 bg-gray-300"></div>
        <div class="flex items-center">
          <div class="w-6 h-6 md:w-10 md:h-10 lg:w-8 lg:h-8 bg-gray-300 text-gray-500 rounded-full flex items-center justify-center font-semibold transition-all duration-300 text-xs md:text-lg lg:text-sm" id="step-2">2</div>
          <span class="ml-1 md:ml-3 lg:ml-2 text-xs md:text-lg lg:text-sm font-medium text-gray-400">Questions</span>
        </div>
      </div>
    </div>

    {{-- Mensaje de éxito --}}
    @if(session('success'))
      <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
        {{ session('success') }}
      </div>
    @endif

    {{-- Mostrar errores de validación --}}
    @if($errors->any())
      <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-6">
        <ul class="list-disc pl-5">
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form 
      action="{{ route('moods.store', ['employee_id' => $employee_id]) }}"
      method="POST"
      class="space-y-6"
    >
      @csrf
      <input type="hidden" name="employee_id" value="{{ $employee_id }}">

      {{-- Título de selección --}}
      <p class="text-lg text-gray-700 text-center">{{ __('moods.comment_te_sents') }}</p>

     
     {{-- Selección de emoción --}}
<div class="flex justify-center items-center space-x-8 md:space-x-16 lg:space-x-12 mb-8">
  @foreach (__('moods.emotions') as $value => $label)
    @php list($emoji, $text) = explode('|', $label); @endphp

    <label class="cursor-pointer flex flex-col items-center group focus:outline-none focus:ring-4 focus:ring-primary/50 rounded-lg p-2 md:p-6 lg:p-4 min-w-[80px] md:min-w-[120px] lg:min-w-[100px]" tabindex="0" role="button" aria-label="Sélectionner l'émotion {{ $text }}" onkeydown="handleEmotionKeydown(event, '{{ $value }}')">
      <input type="radio" name="emotion" value="{{ $value }}" class="hidden">
      <div class="bg-emotion-{{ $value }}/10 rounded-full p-4 md:p-8 lg:p-6 hover:bg-emotion-{{ $value }}/30 transition-all duration-300 transform hover:scale-110 border-2 border-transparent hover:border-emotion-{{ $value }}/50 emoji-hover" tabindex="-1">
        <span class="text-6xl md:text-8xl lg:text-9xl leading-none filter group-hover:drop-shadow-lg transition-all duration-300" role="img" aria-label="{{ $text }}">{{ $emoji }}</span>
      </div>
      <span class="mt-2 md:mt-4 lg:mt-3 text-sm md:text-xl lg:text-lg font-semibold text-gray-800 group-hover:text-emotion-{{ $value }} transition-colors duration-300 text-center">{{ $text }}</span>
    </label>
  @endforeach
</div>


      {{-- Bloque de preguntas oculto hasta elegir emoción --}}
      <div id="questions" class="hidden space-y-6">
        <p class="text-lg font-semibold">{{__('moods.repondre_questions')}}</p>

        <div class="bg-white shadow-lg rounded-xl p-4 md:p-6 border-l-4 border-primary hover:shadow-xl transition-all duration-300">
          <p id="q1" class="font-medium mb-3 md:mb-4 text-gray-800 text-sm md:text-base">1. Lorem ipsum dolor sit amet?</p>
          <div class="space-y-2 md:space-y-3">
            <label class="flex items-center p-2 md:p-3 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors duration-200 min-h-[44px]">
              <input type="radio" name="answer_1" value="1" class="form-radio text-primary h-4 w-4 md:h-5 md:w-5"/>
              <span class="ml-2 md:ml-3 text-gray-700 font-medium text-sm md:text-base">{{__('moods.yes')}}</span>
            </label>
            <label class="flex items-center p-2 md:p-3 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors duration-200 min-h-[44px]">
              <input type="radio" name="answer_1" value="0" class="form-radio text-primary h-4 w-4 md:h-5 md:w-5"/>
              <span class="ml-2 md:ml-3 text-gray-700 font-medium text-sm md:text-base">{{__('moods.no')}}</span>
            </label>
          </div>
        </div>

        <div class="bg-white shadow-lg rounded-xl p-4 md:p-6 border-l-4 border-primary hover:shadow-xl transition-all duration-300">
          <p id="q2" class="font-medium mb-3 md:mb-4 text-gray-800 text-sm md:text-base">2. Consectetur adipiscing elit?</p>
          <div class="space-y-2 md:space-y-3">
            <label class="flex items-center p-2 md:p-3 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors duration-200 min-h-[44px]">
              <input type="radio" name="answer_2" value="1" class="form-radio text-primary h-4 w-4 md:h-5 md:w-5"/>
              <span class="ml-2 md:ml-3 text-gray-700 font-medium text-sm md:text-base">{{__('moods.yes')}}</span>
            </label>
            <label class="flex items-center p-2 md:p-3 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors duration-200 min-h-[44px]">
              <input type="radio" name="answer_2" value="0" class="form-radio text-primary h-4 w-4 md:h-5 md:w-5"/>
              <span class="ml-2 md:ml-3 text-gray-700 font-medium text-sm md:text-base">{{__('moods.no')}}</span>
            </label>
          </div>
        </div>

        <div class="bg-white shadow-lg rounded-xl p-4 md:p-6 border-l-4 border-primary hover:shadow-xl transition-all duration-300">
          <p id="q3" class="font-medium mb-3 md:mb-4 text-gray-800 text-sm md:text-base">3. Sed do eiusmod tempor?</p>
          <div class="space-y-2 md:space-y-3">
            <label class="flex items-center p-2 md:p-3 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors duration-200 min-h-[44px]">
              <input type="radio" name="answer_3" value="1" class="form-radio text-primary h-4 w-4 md:h-5 md:w-5"/>
              <span class="ml-2 md:ml-3 text-gray-700 font-medium text-sm md:text-base">{{__('moods.yes')}}</span>
            </label>
            <label class="flex items-center p-2 md:p-3 rounded-lg hover:bg-gray-50 cursor-pointer transition-colors duration-200 min-h-[44px]">
              <input type="radio" name="answer_3" value="0" class="form-radio text-primary h-4 w-4 md:h-5 md:w-5"/>
              <span class="ml-2 md:ml-3 text-gray-700 font-medium text-sm md:text-base">{{__('moods.no')}}</span>
            </label>
          </div>
        </div>
      </div>

      {{-- Botón de envío --}}
      <button 
        type="submit" 
        class="w-full py-3 md:py-4 lg:py-4 bg-gradient-to-r from-primary to-secondary text-white rounded-xl font-semibold text-base md:text-lg lg:text-lg
               hover:from-secondary hover:to-primary transition-all duration-300 transform hover:scale-105
               shadow-lg hover:shadow-xl focus:outline-none focus:ring-4 focus:ring-primary/50
               active:scale-95 min-h-[48px] md:min-h-[56px] lg:min-h-[56px]"
      >
        {{__('moods.submit')}}
      </button>
    </form>
  </div>

  {{-- Cargar JS para mostrar preguntas --}}
  {{--Pasar traducciones al JavaScript--}}
  <script>
    //Hacer traducciones disponibles globalmente
    window.translations = @json($translations); //Convierte el array de traducciones a JSON
    </script>
  <script src="{{ asset('js/mood-form.js') }}"></script>
</body>
</html>
