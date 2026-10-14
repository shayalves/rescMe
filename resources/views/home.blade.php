@extends('layouts.site')

@section('content')
    <section class="mx-auto max-w-6xl pt-6 pb-3 py-24">
        <div class="flex flex-col md:flex-row justify-between">
            <div class="w-full px-3 md:px-0md:w-1/2 lg:w-1/3 text-center md:text-left">
                <h1 class="text-5xl font-bold text-secondary sm:text-5xl lg:mt-15"><span data-i18n="hero.titlePrefix">Help is one tap </span><span class="text-primary" data-i18n="hero.titleAccent">away.</span></h1>
                <p class="mt-10 mb-10 text-lg text-regular-text" data-i18n="hero.description">
                    RescMe connects you with your emergency contacts, when you need them the most with automated customizable messages.
                </p>
                <a href="#download" class="bg-primary text-white py-2 px-4 rounded-full hover:bg-primary-dark text-lg">
                    <span data-i18n="hero.download">Download the app</span> <i class="ml-2 fas fa-download"></i>
                </a>
            </div>
            <div class="block md:hidden w-full text-center">
                <img src="{{ Vite::asset('resources/images/mock_app_mobile.png') }}" alt="RescMe app preview" data-i18n-alt="hero.imageAlt" class="my-15 inline-block w-4/7">
            </div>
            <div class="hidden md:block md:w-full px-3 md:px-0 md:w-1/2 lg:w-2/7">
                <img src="{{ Vite::asset('resources/images/mock_app.png') }}" alt="RescMe app preview" data-i18n-alt="hero.imageAlt" class="w-full">
            </div>
        </div>
    </section>
    <div class="bg-light" id="features">
        <section class="mx-auto max-w-6xl px-6 py-24">
            <h1 class="text-3xl text-center font-semibold text-secondary" data-i18n="features.title">Built for the moments that matter</h1>
            <div class="grid gap-14 md:grid-cols-3 md:gap-5">
                <div class="rounded-xl mt-15 bg-white p-6 text-center shadow-xl">
                    <div class="mx-auto flex h-16 w-16 -translate-y-12 transform items-center justify-center rounded-full shadow-lg bg-primary">
                        <i class="fas fa-bell text-white text-lg"></i>
                    </div>
                    <h1 class="text-darken mt-0 mb-3 text-xl font-medium lg:px-14" data-i18n="features.oneTap.title">One-tap SOS</h1>
                    <p class="px-4 text-gray-500" data-i18n="features.oneTap.description">
                        A single press alerts emergency services and your trusted contacts with your live location.
                    </p>
                </div>
                <div class="rounded-xl mt-15 bg-white p-6 text-center shadow-xl">
                    <div class="mx-auto flex h-16 w-16 -translate-y-12 transform items-center justify-center rounded-full shadow-lg bg-primary">
                        <i class="fas fa-envelope text-white text-lg"></i>
                    </div>
                    <h1 class="text-darken mt-0 mb-3 text-xl font-medium lg:px-14" data-i18n="features.messages.title">Custom messages</h1>
                    <p class="px-4 text-gray-500" data-i18n="features.messages.description">
                        Create custom messages to notify your emergency contacts with personalized information.
                    </p>
                </div>
                <div class="rounded-xl mt-15 bg-white p-6 text-center shadow-xl">
                    <div class="mx-auto flex h-16 w-16 -translate-y-12 transform items-center justify-center rounded-full shadow-lg bg-primary">
                        <i class="fas fa-map-marker-alt text-white text-lg"></i>
                    </div>
                    <h1 class="text-darken mt-0 mb-3 text-xl font-medium lg:px-14" data-i18n="features.location.title">Location sharing</h1>
                    <p class="px-4 text-gray-500" data-i18n="features.location.description">
                        Share your most recent locations with your emergency contacts for enhanced safety.
                    </p>
                </div>
            </div>
        </section>
    </div>
    <section id="how-it-works" class="py-24">
        <div class="mx-auto max-w-6xl px-6">
            <h2 class="text-3xl text-center font-semibold text-secondary" data-i18n="steps.title">
                Three steps to safety
            </h2>
            <div class="mt-15 grid gap-10 md:grid-cols-3 text-secondary">
                <div class="text-center">
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full text-2xl font-extrabold text-white"
                        style="background-color:#FF5155">1</div>
                    <h3 class="mt-5 text-xl font-bold" data-i18n="steps.contacts.title">Create emergency contacts</h3>
                    <p class="mx-auto mt-2 max-w-xs text-sm leading-relaxed opacity-70" data-i18n="steps.contacts.description">
                        Add your trusted contacts who should be notified in case of an emergency.
                    </p>
                </div>
                <div class="text-center">
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full text-2xl font-extrabold text-white"
                        style="background-color:#FF5155">2</div>
                    <h3 class="mt-5 text-xl font-bold" data-i18n="steps.messages.title">Set up automatic messages
                    </h3>
                    <p class="mx-auto mt-2 max-w-xs text-sm leading-relaxed opacity-70" data-i18n="steps.messages.description">
                        Configure automatic messages to notify your emergency contacts with your location and status.
                    </p>
                </div>
                <div class="text-center">
                    <div class="mx-auto flex h-16 w-16 items-center justify-center rounded-full text-2xl font-extrabold text-white"
                        style="background-color:#FF5155">3</div>
                    <h3 class="mt-5 text-xl font-bold" data-i18n="steps.location.title">Allow location sharing
                    </h3>
                    <p class="mx-auto mt-2 max-w-xs text-sm leading-relaxed opacity-70" data-i18n="steps.location.description">
                        Allow RescMe to share your location with your emergency contacts during an emergency.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section id="download" class="px-6 pb-24">
        <div class="mx-auto max-w-6xl rounded-[2.5rem] px-8 py-16 text-center text-white md:py-20" style="background-color:#242A32">
            <div class="mx-auto flex justify-center">
            <div class="flex items-center gap-2">
                <svg width="34" height="34" viewBox="0 0 100 100" aria-hidden="true">
                <path d="M50 4C30 4 14 20 14 40c0 26 36 56 36 56s36-30 36-56C86 20 70 4 50 4z" fill="#FF5155"></path>
                <path d="M50 52c-1.5 0-3-.6-4.1-1.7l-8.6-8.6a7.6 7.6 0 0 1 0-10.8 7.6 7.6 0 0 1 10.8 0l1.9 1.9 1.9-1.9a7.6 7.6 0 0 1 10.8 0 7.6 7.6 0 0 1 0 10.8l-8.6 8.6A5.8 5.8 0 0 1 50 52z" fill="#fff"></path>
                </svg>
                <span class="text-xl font-extrabold tracking-tight" style="color:#fff">
                Resc<span style="color:#FF5155">Me</span>
                </span>
            </div>
            </div>
            <h2 class="mx-auto mt-6 max-w-lg text-3xl font-extrabold tracking-tight md:text-4xl" data-i18n="download.tagline">
            Because everyone deserves to feel safe.
            </h2>
            <p class="mx-auto mt-4 max-w-md text-white/70" data-i18n="download.description">
            Download RescMe today and set up your safety network in under two minutes.
            </p>
            <div class="mt-8 flex flex-wrap justify-center gap-4">
                <a href="#" class="rounded-full px-8 py-3.5 font-semibold text-white transition hover:brightness-95" style="background-color:#FF5155" data-i18n="download.android">
                    Download for Android
                </a>
            </div>
        </div>
    </section>
@endsection
