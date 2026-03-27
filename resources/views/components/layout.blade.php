<!DOCTYPE html>
<html lang="de" data-theme="corporate">
<head>
  <meta charset="UTF-8">
  <link href="boilerplate.css" rel="stylesheet">
 @vite(['resources/css/app.css', 'resources/js/app.js'])
  <title>Layout</title>
</head>
@auth

            @if(auth()->user()->unreadNotifications->count() >0)
<div role="alert" class="alert">
  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="stroke-info h-6 w-6 shrink-0">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
  </svg>
  <span>{{ auth()->user()->unreadNotifications->count() }} ungelesene Notifications.</span>
     @foreach(auth()->user()->unreadNotifications as $notification)
                       <li>
                           <a href="{{$notification->data['url']}}" class="btn">
                               {{$notification->data['message']}}
                               ({{$notification->data['title']}})
                            </a>
                        </li>
                    @endforeach
                      <a href="/notifications-mark-read" class="btn">
                            Alle als gelesen markieren

                        </a>
                    @else
                        <p><em> Keine neuen Benachrichtigungen. </em></p>
                    @endif


</div>

    @endauth
<body class="max-w-7xl">
 <div class="flex flex-col max-w-7xl p-5 gap-5 ">
    <x-navbar>
        </x-navbar>
     <main>
         {{$slot}}
         </main>



     </div>
<div class="flex">
<x-footer>
    </x-footer>
    </div>
</body>
</html>
