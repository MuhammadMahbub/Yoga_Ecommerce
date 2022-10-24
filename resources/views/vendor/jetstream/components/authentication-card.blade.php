@auth
<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 {{ (themesettings(Auth::id())->theme == 'dark-layout') ? 'bg-dark-light' : 'bg-gray-100' }}">
    <div>
        {{ $logo }}
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 {{ (themesettings(Auth::id())->theme == 'dark-layout') ? 'bg-dark' : 'bg-white' }} shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
@endauth

@guest
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div>
            {{ $logo }}
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
@endguest
