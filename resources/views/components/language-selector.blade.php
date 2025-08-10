
<div class="flex items-center space-x-2">
    <span class="text-sm text-gray-600">{{ __('admin.language') }}:</span>
    <div class="flex space-x-1">
        <a href="{{ request()->fullUrlWithQuery(['lang' => 'es']) }}" 
           class="px-2 py-1 text-xs rounded {{ app()->getLocale() === 'es' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
            {{ __('admin.spanish') }}
        </a>
        <a href="{{ request()->fullUrlWithQuery(['lang' => 'en']) }}" 
           class="px-2 py-1 text-xs rounded {{ app()->getLocale() === 'en' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
            {{ __('admin.english') }}
        </a>
        <a href="{{ request()->fullUrlWithQuery(['lang' => 'fr']) }}" 
           class="px-2 py-1 text-xs rounded {{ app()->getLocale() === 'fr' ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700 hover:bg-gray-300' }}">
            {{ __('admin.french') }}
        </a>
    </div>
</div>

