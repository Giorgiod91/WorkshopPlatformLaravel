<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Notifications\PushToTask;
use App\Models\Workshop;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class WorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $count = Workshop::count();
        $user_count = User::count();
        return view('workshops.index', ['workshops'=> Workshop::latest()->paginate(2), 'count'=> $count, 'user_count'=> $user_count]);
    }

    public function landingPage(){
        return view('landingPage', ['workshops'=> Workshop::latest()->paginate(3)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('workshops.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'=>['required'],
            'description'=>['required'],
            'image_path'=>['required','image','max:2048'],
        ]);
        // Bild ins Zielverzeichnis speichern
        $validated['image_path'] = $request->file('image_path')->store('images','public');

        Workshop::create($validated);

        // Benachrichtigungen
        //
        foreach($request->input('users', [])as $userId)
        {
            $user = User::find($userId);
            $user->notify(new PushToTask($workshop));
        }

        return redirect('/workshops')->with('success', 'Workshop erfolgreich angemeldet');
    }

    /**
     * Display the specified resource.
     */
    public function show(Workshop $workshop)
    {

        //  Gate::authorize('workshops',$workshop);
        return view('workshops.show', ['workshop'=>$workshop]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Workshop $workshop)
    {
        Gate::authorize('workshops',$workshop);
        return view('workshops.edit', ['workshops'=>$workshop]);
    }

public function teilnehmen(Workshop $workshop)
{
    $user = Auth::user(); // aktuell eingeloggter User

    // User an Workshop anhängen, ohne bestehende Einträge zu löschen
    $workshop->users()->attach([$user->id]);

    return redirect()->back()->with('success', 'Du nimmst jetzt am Workshop teil!');
}
public function abmelden(Workshop $workshop){
    $user = Auth::user();

    $workshop->users()->detach([$user->id]);

    return redirect()->back()->with('success', 'Du hast dich für den Workshop abgemeldet!');
}
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Workshop $workshop)
    {

        Gate::authorize('workshops',$workshop);
        //::TODO add validation
        $workshop->title = $request->input('title');
        $workshop->description = $request->input('description');
        $workshop->image_path = $request->input('image_path');

        $users = $workshop->users()->sync($request->input('users'));
    foreach($request->input('users', [])as $userId)
        {
            $user = User::find($userId);
            $user->notify(new PushToTask($workshop));
        }

        return redirect("/workshops/$workshop->id")->with('success', 'Workshop wurde aktualisiert.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Workshop $workshop)
    {

        $workshop->delete();
        //::TODO fix redirect
        return redirect('/')->with('success', 'Workshop wurde erfolgreich entfernt');
    }


}
