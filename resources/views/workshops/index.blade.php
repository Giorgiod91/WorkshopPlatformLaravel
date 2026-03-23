<x-layout>


<div class="flex">


@forelse($workshop as $ws)


    <p>{{$ws->title}}</p>
    <p>{{$ws->description}}</p>
   <img src="{{$ws->image_path}}" />
   <a href="/workshops/{{$ws->id}}/edit">Bearbeiten </a>

    <a href="/workshops/create/"> Neuen Workshop Erstellen </a>
@empty
    <p>Keine Workshops vorhanden</p>
@endforelse






    </div>


    </x-layout>
