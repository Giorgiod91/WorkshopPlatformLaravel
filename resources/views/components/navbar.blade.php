<div class="navbar bg-base-100 shadow-sm border-b border-base-200">
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
            @can('workshops')
                <li><a href="/workshops/create">Erstelle Workshops</a></li>
            @endcan
            <li><a href="/workshops">Workshops</a></li>
            <li><a href="/logout" class="btn bg-gradient-to-br from-[#FF705B] to-[#FFB457] border-none text-white btn-sm">Logout</a></li>
        @endauth
        <li>
            <a href="/" class="btn btn-ghost btn-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3 12l2-2m0 0l7-7 7 7m-9 5v6h4v-6m-4 0H9m6 0h-2" />
                </svg>
            </a>
        </li>
    </ul>
  </div>
</div>
