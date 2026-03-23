<!DOCTYPE html>
<html lang="de" data-theme="cyberpunk">
<head>
  <meta charset="UTF-8">
  <link href="boilerplate.css" rel="stylesheet">
 @vite(['resources/css/app.css', 'resources/js/app.js'])
  <title>Layout</title>
</head>
@auth
        <div>
            <h2>Benachrichtigungen </h2>
            @if(auth()->user()->unreadNotifications->count() >0)
                <ul>
                    @foreach(auth()->user()->unreadNotifications as $notification)
                       <li>
                           <a href="{{$notification->data['url']}}" class="btn">
                               {{$notification->data['message']}}
                               ({{$notification->data['title']}})
                            </a>
                        </li>
                    @endforeach
                    </ul>
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
</body>
</html>
