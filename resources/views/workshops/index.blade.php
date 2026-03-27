<x-layout>

<div class="grid grid-cols-3 gap-4">
    @foreach($workshops as $ws)
    <div class="card bg-base-100 shadow-sm hover:shadow-lg hover:scale-102 transition cursor-pointer">
        <figure>
            <img src="{{ asset($ws->image_path) }}" alt="Workshop" class="object-cover h-48 w-full">
        </figure>
        <div class="card-body">
            <h2 class="card-title">{{ $ws->title }}</h2>
            <p class="text-sm opacity-70">{{ $ws->description }}</p>
            <div class="card-actions mt-2 flex gap-2">
                @if(auth()->user()?->workshops->contains($ws->id))
                    <a href="/workshops/{{ $ws->id }}/abmelden" class="btn btn-outline btn-sm">Abmelden</a>
                @else
                    <a href="/workshops/{{ $ws->id }}/teilnehmen" class="btn bg-gradient-to-br from-[#FF705B] to-[#FFB457] border-none text-white btn-sm">Teilnehmen</a>
                    <a href="/workshops/{{ $ws->id }}/teilnehmen?certificate=1" class="btn btn-outline btn-sm">Mit Zertifikat</a>
                @endif
                <a href="/workshops/{{ $ws->id }}" class="btn btn-outline btn-sm">Details</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="mt-4">{{ $workshops->links() }}</div>

</x-layout>
