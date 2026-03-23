<x-layout>


<div class="flex">


@forelse($workshop as $ws)
<div class="card bg-base-100 w-96 shadow-sm">
  <figure>
    <img
      src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp"
      alt="Shoes" />
  </figure>
  <div class="card-body">
    <h2 class="card-title">{{$ws->title}}</h2>
    <p>{{$ws->description}}</p>
    <div class="card-actions justify-end">
      <button class="btn btn-primary"><a href="/workshops/{{$ws->id}}/edit">Bearbeiten </a></button>
    </div>
  </div>
</div>
    <a href="/workshops/create/"> Neuen Workshop Erstellen </a>
@empty
    <p>Keine Workshops vorhanden</p>
@endforelse





    </div>


    </x-layout>
