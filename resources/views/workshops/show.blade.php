<x-layout>

    <div class="max-w-lg mx-auto mt-10 space-y-6">
        <div class="card bg-base-100 shadow p-6">
            <h2 class="card-title text-2xl mb-2">{{$workshop->title}}</h2>
            <p>Datum : {{ $workshop->workshop_date ? $workshop->workshop_date : 'noch unbekanntes Datum' }}</p>
            <p>Uhrzeit : {{ $workshop->workshop_time ? substr($workshop->workshop_time, 0, 5) : '-' }}</p>
            <p>Preis : {{ $workshop->price }} EUR</p>
            <p class="mb-4">{{$workshop->description}}</p>
            <img src="{{asset($workshop->image_path)}}" alt="Workshop Bild" class="rounded-lg object-cover max-w-120 max-h-64 mb-4" />
            <div class="flex flex-wrap gap-2 mt-4">
                <a href="/workshops" class="btn">Zurück</a>
                @can('workshops')
                    <a href="/workshops/{{$workshop->id}}/edit" class="btn btn-primary">Bearbeiten</a>
                    <form action='/workshops/{{$workshop->id}}' method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-error">Löschen</button>
                    </form>
                @endcan
            </div>
        </div>
    </div>

</x-layout>

