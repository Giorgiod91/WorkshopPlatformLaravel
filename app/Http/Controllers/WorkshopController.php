<?php

namespace App\Http\Controllers;
use App\Models\Task;
use App\Notifications\PushToTask;
use App\Models\Workshop;
use Illuminate\Http\Request;

class WorkshopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('workshops.index', ['workshop'=> Workshop::get()]);
    }

    public function landingPage(){
        return view('landingPage', ['workshop'=> Workshop::latest()->paginate(3)]);
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
        foreach($request->input('users')as $userId)
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

        Gate::authorize('workshops',$workshop);
        return view('workshops.show', ['workshop'=>$workshop]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Workshop $workshop)
    {
        Gate::authorize('workshops',$workshop);
        return view('workshops.edit', ['workshop'=>$workshop]);
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

        $users = $workshop->users()-sync($request->input('users'));
    foreach($request->input('users')as $userId)
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
