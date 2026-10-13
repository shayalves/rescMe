@extends('layouts.site')

@section('content')
    <section class="mx-auto max-w-6xl px-6 py-24 text-center">
        <h1 class="text-4xl font-bold text-primary sm:text-5xl">Welcome to {{ config('app.name') }}</h1>
        <p class="mt-4 text-lg text-regular-text">Placeholder home page. Content coming soon.</p>
    </section>

    @foreach ([
        'about' => 'About us',
        'faq' => 'FAQ',
        'contact' => 'Contact Us',
        'terms' => 'Terms',
    ] as $id => $title)
        <section id="{{ $id }}" class="mx-auto max-w-6xl scroll-mt-20 border-t border-secondary px-6 py-24">
            <h2 class="text-2xl font-semibold text-secondary">{{ $title }}</h2>
            <p class="mt-3 text-regular-text">Placeholder content.</p>
        </section>
    @endforeach
@endsection
