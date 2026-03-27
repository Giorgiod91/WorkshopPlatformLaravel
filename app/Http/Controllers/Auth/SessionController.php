<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class SessionController extends Controller
{

    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // validieren
        $validated = $request->validate([
         'email' => ['required','string','email'],
           'password' => ['string'],
        ]);

        //dd($validated);

        // Prüfung DB + Einloggen + Redirect
        if(Auth::attempt($validated)){
           $request->session()->regenerate();
           return redirect('/workshops')->with('success','Du bist eingeloggt!');
        }

        // Zum Formular + Fehlerausgabe
        return back()->withErrors([
            'email' => 'Die Anmeldedaten sind ungültig!',
        ]);
    }


    public function destroy()
    {
         Auth::logout();
         return redirect('/workshops')->with('success','Du bist jetzt ausgeloggt!');
    }
}
