<x-layout>


<div class="grid grid-cols-3 gap-4 ">


@foreach($workshops as $ws)


<div class="card cursor-pointer hover:scale-102 bg-base-100 w-96 shadow-sm">
  <figure>
    <img src="https://img.daisyui.com/images/stock/photo-1606107557195-0e29a4b5b4aa.webp" alt="Workshop">
  </figure>
  <div class="card-body">
    <h2 class="card-title">{{$ws->title}}</h2>
    <p>{{$ws->description}}</p>


    <div class="flex justify-between space-x-2">

       @if(auth()->user() && auth()->user()->workshops->contains($ws->id))
          <button class="btn btn-primary">
              <a href="/workshops/{{$ws->id}}/abmelden">Abmelden</a>
          </button>
      @else
          <button class="btn btn-primary">
              <a href="/workshops/{{$ws->id}}/teilnehmen">Teilnehmen</a>
          </button>
      @endif
  <button class="btn btn-primary">
              <a href="/workshops/{{$ws->id}}">Details</a>
          </button>

    </div>
  </div>
</div>
@endforeach

{{$workshops->links()}}
<div class="flex w-[600px]">

<div class="stats hover:scale-102 cursor-pointer shadow">
  <div class="stat">
    <div class="stat-figure text-secondary">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        class="inline-block h-8 w-8 stroke-current"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"
        ></path>
      </svg>
    </div>
    <div class="stat-title">Workshops</div>



        <div class="stat-value">{{$count}}</div>
    <div class="stat-desc">2026</div>
  </div>

  <div class="stat">
    <div class="stat-figure text-secondary">
      <svg
        xmlns="http://www.w3.org/2000/svg"
        fill="none"
        viewBox="0 0 24 24"
        class="inline-block h-8 w-8 stroke-current"
      >
        <path
          stroke-linecap="round"
          stroke-linejoin="round"
          stroke-width="2"
          d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"
        ></path>
      </svg>
    </div>
    <div class="stat-title">Mitgliederzahl</div>
    <div class="stat-value">{{$user_count}}</div>
    <div class="stat-desc">↗︎ 2026</div>
  </div>

</div>




    </div>

   </x-layout>
