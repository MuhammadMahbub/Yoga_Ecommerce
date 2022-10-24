<div class="md:col-span-1 flex justify-between">
    <div class="px-4 sm:px-0">
        <h3 class="text-lg font-medium {{ (themesettings(Auth::id())->theme == 'dark-layout') ? 'text-white' : 'text-gray-900' }}">{{ $title }}</h3>

        <p class="mt-1 text-sm {{ (themesettings(Auth::id())->theme == 'dark-layout') ? 'text-white' : 'text-gray-600' }}">
            {{ $description }}
        </p>
    </div>

    <div class="px-4 sm:px-0">
        {{ $aside ?? '' }}
    </div>
</div>
