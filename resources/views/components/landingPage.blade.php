<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8">
  <link href="boilerplate.css" rel="stylesheet">
  <title>Document</title>
</head>
<body>
<div class="flex flex-row gap-5  space-y-5 max-w-7xl ">
<div class="flex flex-col p-2   space-y-3 rounded-lg w-1/2">


@foreach($workshop as $ws)

<div class="card card-side bg-base-100 hover:scale-102 trainsition ease-in-out cursor-pointer shadow-sm">
  <figure>
    <img
      src="https://img.daisyui.com/images/stock/photo-1635805737707-575885ab0820.webp"
      alt="Movie" />
  </figure>
  <div class="card-body">
    <h2 class="card-title">{{$ws->title}}</h2>
    <p>Click the button to watch on Jetflix app.</p>
    <div class="card-actions justify-end">
      <button class="btn btn-primary"><a href="/projects">Zeig </a></button>
    </div>
  </div>
</div>
@endforeach
    </div>
<div class="flex flex-col pt-30 p-2  pl-10  w-1/2">
    <h1 class="text-6-xl"> Project </h1>
    <p class="font-bold"> Das neue Project wird hier angezeigt </p>
    </div>
    </div>
    <div class="flex">
<div class="stats shadow  hover:scale-102">
  <div class="stat">
      @php $count =0;
      @endphp
      @foreach($workshop as $ws)
          @php $count++;
          @endphp

    <div class="stat-title">Workshops</div>
    <div class="stat-value ">Es gibt:{{$count}} {{$count <2 ? "Projekt" : "Projekte"}}</div>
    <div class="stat-desc">{{$count}} mehr als letzten Monat</div>

@endforeach
  </div>
</div>
</div>
<div class="flex">

@forelse($workshop as $ws)

<p>{{$ws}}</p>

@empty
    <p>Keine Workshops vorhanden </p>
@endforelse
    </div>
</body>
</html>
