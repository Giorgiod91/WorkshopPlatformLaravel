<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Workshop;
use App\Notifications\WorkshopsNotifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Notification;

class WorkshopController extends Controller
{
  
    public function landing()
    {
        $count = Workshop::count();
        $user_count = User::count();

        return view('welcome', ['count' => $count, 'user_count' => $user_count]);
    }

    public function index()
    {
        $count = Workshop::count();
        $user_count = User::count();

        return view('workshops.index', [
            'workshops' => Workshop::latest()->paginate(2),
            'count' => $count,
            'user_count' => $user_count,
        ]);
    }

    public function create()
    {
        return view('workshops.create');
    }

  
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'price' => ['required', 'numeric', 'min:0'],
            'workshop_date' => ['required', 'date'],
            'workshop_time' => ['nullable', 'date_format:H:i'],
            'image_path' => ['required', 'image', 'max:2048'],
        ]);

        $validated['image_path'] = $request->file('image_path')->store('images', 'public');
        $workshop = Workshop::create($validated);

        $userIds = $request->input('users', []);
        if (!empty($userIds)) {
            $syncResult = $workshop->users()->sync($userIds);
            foreach ($syncResult['attached'] as $userId) {
                $user = User::find($userId);
                if ($user) {
                    Notification::send($user, new WorkshopsNotifications($workshop));
                }
            }
        }

        return redirect('/workshops')->with('success', 'Workshop erfolgreich angemeldet');
    }

  
    public function show(Workshop $workshop)
    {
        return view('workshops.show', ['workshop' => $workshop]);
    }

  
    public function edit(Workshop $workshop)
    {
        Gate::authorize('workshops', $workshop);

        return view('workshops.edit', ['workshops' => $workshop]);
    }

    public function teilnehmen(Request $request, Workshop $workshop)
    {
        $user = Auth::user();
        $wantsCertificate = $request->boolean('certificate');

        if ($user) {
            $alreadyJoined = $workshop->users()->where('user_id', $user->id)->exists();

            if (! $alreadyJoined) {
                $workshop->users()->attach($user->id, ['wants_certificate' => $wantsCertificate]);
                Notification::send($user, new WorkshopsNotifications($workshop));
            } elseif ($wantsCertificate) {
                $workshop->users()->updateExistingPivot($user->id, ['wants_certificate' => true]);
            }
        }

        return redirect()->back()->with('success', 'Du nimmst jetzt am Workshop teil!');
    }

    public function abmelden(Workshop $workshop)
    {
        $user = Auth::user();

        if ($user) {
            $workshop->users()->detach([$user->id]);
        }

        return redirect()->back()->with('success', 'Du hast dich für den Workshop abgemeldet!');
    }

 
    public function update(Request $request, Workshop $workshop)
    {
        Gate::authorize('workshops', $workshop);

        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'price' => ['required', 'numeric', 'min:0'],
            'workshop_date' => ['required', 'date'],
            'workshop_time' => ['nullable', 'date_format:H:i'],
            'image_path' => ['nullable', 'image', 'max:2048'],
        ]);

        $workshop->title = $request->input('title');
        $workshop->description = $request->input('description');
        $workshop->price = $request->input('price');
        $workshop->workshop_date = $request->input('workshop_date');
        $workshop->workshop_time = $request->input('workshop_time');

        if ($request->hasFile('image_path')) {
            $workshop->image_path = $request->file('image_path')->store('images', 'public');
        }

        $workshop->save();

        $userIds = $request->input('users', []);
        foreach ($workshop->users()->sync($userIds)['attached'] as $userId) {
            $user = User::find($userId);
            if ($user) {
                Notification::send($user, new WorkshopsNotifications($workshop));
            }
        }

        return redirect("/workshops/$workshop->id")->with('success', 'Workshop wurde aktualisiert.');
    }

   
    public function destroy(Workshop $workshop)
    {
        $workshop->users()->detach();
        $workshop->delete();

        return redirect('/')->with('success', 'Workshop wurde erfolgreich entfernt');
    }

    public function markNotificationsRead()
    {
        $user = Auth::user();
        if ($user) {
            $user->unreadNotifications->markAsRead();
        }

        return redirect()->back();
    }
}
