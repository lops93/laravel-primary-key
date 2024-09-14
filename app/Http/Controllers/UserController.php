<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\RecordCreatedNotification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        return view('pages.user.index', [
            'users' => User::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function sendNotification()
    {
        $user= Auth::user() ? Auth::user()->name : 'Unknown';

        // Fetch the user with ID 103
        $notifiable_id = User::find(101);

        // Mock a record object to pass to the notification
        $record = User::factory()->create([
            'name' => 'test',
            'email' => 'test@test',
        ]);

        // Send the notification
        $notifiable_id->notify(new RecordCreatedNotification($record, $user));

        return response()->json(['message' => 'Notification sent to user 103'], 200);
    }
}
