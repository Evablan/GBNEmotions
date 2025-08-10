@props(['label', 'emoji'])

<button
  type="button"
  aria-label="{{ $label }}"
  {{ $attributes->merge([
      'class' => 'flex items-center justify-center
                  w-full h-12
                  bg-[#30CFD0] text-white font-medium
                  rounded-xl
                  transform transition duration-150
                  hover:scale-105
                  focus:outline-none focus:ring-4 focus:ring-[#FFB366]/50
                  active:scale-95'
  ]) }}
>
  {{ $emoji }}
</button>
