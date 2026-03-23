<div class="navbar bg-base-100 shadow-sm">
  <div class="flex-1">
<div class="avatar">
@php $user = "Giorgio"
@endphp

  <div class="w-18 rounded">
    <img src="https://img.daisyui.com/images/profile/demo/batperson@192.webp" />

  </div>

    <p class="font-bold pb-3 pl-2"> Hey {{auth()->user()->name?? ''}}</p>

</div>


  </div>
  <div class="flex-none">
    <ul class="menu menu-horizontal px-1">
        @guest
      <li><a href="/login">Login</a></li>
  @endguest
     @auth
               <a href="/logout" class="btn btn-primary">Logout</a>

            @endauth
      <li>
        <details>
          <summary>Mehr</summary>
          <ul class="bg-base-100 rounded-t-none p-2">
              @can('workshops')
            <li><a href="/workshops/create">Erstelle Workshops</a></li>
        @endcan
            <li><a href="/workshops">Workshop Übersicht</a></li>
          </ul>
        </details>
      </li>
    </ul>
  </div>
</div>
