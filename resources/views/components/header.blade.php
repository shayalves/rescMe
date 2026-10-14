
<header class="sticky top-0 z-50 bg-primary shadow">
    <nav class="mx-auto flex max-w-6xl flex-wrap items-center justify-between gap-2 px-6 py-4">
        <a href="{{ route('home') }}" class="flex items-center">
            <img src="{{ Vite::asset('resources/images/rescme-logo-white.svg') }}" alt="RescMe" class="h-10 w-auto">
        </a>
        <ul class="flex flex-wrap items-center gap-6 text-sm font-medium text-menu-text">
            <li><a href="{{ route('home') }}" class="hover:underline" data-i18n="nav.home">Home</a></li>
            <li><a href="/#features" class="hover:underline" data-i18n="nav.features">Features</a></li>
            <li><a href="/#how-it-works" class="hover:underline" data-i18n="nav.howItWorks">How it works</a></li>
        </ul>
        <span class="flex items-center gap-4">
            <details class="relative text-sm text-menu-text" data-language-switcher>
                <summary class="flex cursor-pointer list-none items-center gap-1 opacity-80 hover:opacity-100 [&::-webkit-details-marker]:hidden" aria-label="Language">
                    <i class="fas fa-globe text-xs"></i>
                    <span data-language-current>EN</span>
                    <i class="fas fa-chevron-down text-[10px]"></i>
                </summary>
                <ul class="absolute right-0 mt-2 min-w-32 rounded-md bg-white py-1 text-regular-text shadow-lg">
                    <li><button type="button" class="w-full px-4 py-1.5 text-left hover:bg-light" data-language-option="en">English</button></li>
                    <li><button type="button" class="w-full px-4 py-1.5 text-left hover:bg-light" data-language-option="es">Español</button></li>
                    <li><button type="button" class="w-full px-4 py-1.5 text-left hover:bg-light" data-language-option="pt-BR">Português</button></li>
                </ul>
            </details>
            <a href="#download" class="bg-white font-semibold text-primary py-2 px-4 hover:border-transparent rounded-full" data-i18n="nav.getApp">Get the App</a>
        </span>
    </nav>
</header>