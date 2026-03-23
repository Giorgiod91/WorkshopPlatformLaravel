<x-layout>
    <div class="flex">
    <p>{{$workshop->title}}</p>
    <p>{{$workshop->description}}</p>
    <img src="{{asset($workshop->image_path)}}"/>



     <div class="flex items-center gap-2">
            <a href="/workshops" class="btn">Zurück</a>
            @can('workshops')
            <a href="/workshops/{{$workshop->id}}/edit" class="btn btn-primary">Bearbeiten</a>
            <form action='/workshops/{{$workshop->id}}' method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-error">Löschen</button>
            </form>
        @endcan

        </div>
        </div>

</x-layout>

