@props(['count' => 0, 'userCount' => 0])
@php
$cards = [
    ['logo' => '🗓️', 'heading' => 'Workshops entdecken', 'text' => 'Finde passende Workshops und melde dich direkt an – schnell und einfach.'],
    ['logo' => '🧠', 'heading' => 'Wissen erweitern', 'text' => 'Lerne von Experten und bringe deine Fähigkeiten auf das nächste Level.'],
    ['logo' => '🚀', 'heading' => 'Schnell & Einfach', 'text' => 'In wenigen Klicks angemeldet – keine langen Formulare, kein Aufwand.'],
    ['logo' => '🛠️', 'heading' => 'Alles an einem Ort', 'text' => 'Verwalte deine Anmeldungen und behalte den Überblick über alle Workshops.'],
];

$highlights = ['Schnell & Einfach', 'Kostenlos registrieren', 'Direkt loslegen'];
@endphp

<section class="py-20 px-6">
    <div class="mx-auto grid max-w-7xl grid-cols-1 gap-16 lg:grid-cols-2 lg:items-center lg:gap-24">

        {{-- Linke Seite --}}
        <div class="space-y-6">
            <h1 class="text-5xl font-extrabold leading-tight tracking-tight sm:text-6xl">
                Deine Workshops.
                <span class="bg-gradient-to-br from-[#FF705B] to-[#FFB457] bg-clip-text text-transparent">
                    Dein Wissen.
                </span>
            </h1>

            <p class="max-w-xl text-lg opacity-70">
                Entdecke spannende Workshops, melde dich an und erweitere deine Fähigkeiten – alles auf einer Plattform.
            </p>

            <a href="/login" class="btn bg-gradient-to-br from-[#FF705B] to-[#FFB457] border-none text-white px-6 py-3 text-lg font-semibold shadow-xl hover:scale-105 transition-transform duration-200">
                Jetzt starten 🚀
            </a>

            <div class="flex flex-wrap gap-4 text-sm opacity-70 mt-3">
                @foreach($highlights as $h)
                    <div class="flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="#FD7E14">
                            <path d="M20.7 6a1.25 1.25 0 0 0-.86.37L9 17.23l-4.88-4.87a1.25 1.25 0 1 0-1.77 1.77l5.77 5.75a1.25 1.25 0 0 0 1.77 0L21.64 8.14A1.25 1.25 0 0 0 20.7 6z"/>
                        </svg>
                        <span>{{ $h }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Rechte Seite: Stats --}}
        <div class="stats shadow w-full">
            <div class="stat">
                <div class="stat-figure text-primary text-4xl">🗓️</div>
                <div class="stat-title">Verfügbare Workshops</div>
                <div class="stat-value text-primary">{{ $count }}</div>
                <div class="stat-desc">Jetzt anmeldbar</div>
            </div>
            <div class="stat">
                <div class="stat-figure text-secondary text-4xl">👥</div>
                <div class="stat-title">Teilnehmer</div>
                <div class="stat-value text-secondary">{{ $userCount }}</div>
                <div class="stat-desc">Aktive Nutzer</div>
            </div>
        </div>
    </div>

    {{-- Feature-Karten --}}
    <div class="mt-16 grid max-w-7xl mx-auto grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
        @foreach($cards as $card)
            <div class="flex flex-col rounded-2xl border border-base-300 bg-gradient-to-br from-[#FF705B]/10 to-[#FFB457]/10 p-6 shadow-lg transition hover:shadow-xl hover:scale-105 cursor-pointer">
                <div class="text-3xl mb-3">{{ $card['logo'] }}</div>
                <h3 class="text-lg font-semibold">{{ $card['heading'] }}</h3>
                <p class="mt-2 text-sm opacity-70">{{ $card['text'] }}</p>
            </div>
        @endforeach
    </div>
</section>

