@props(['emoji', 'text'])

<div class="bg-white shadow-lg rounded-2xl p-6 mb-6 max-w-md mx-auto">
  <!-- Emoji grande -->
  <div class="text-5xl mb-4">{{ $emoji }}</div>

  <!-- Texto de la pregunta -->
  <h3 class="text-xl font-semibold text-gray-800 mb-6">
    {{ $text }}
  </h3>

  <!-- Slot para los botones/respuestas -->
  <div class="grid grid-cols-5 gap-3">
    {{ $slot }}
  </div>
</div>
