<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        return auth()->user()->notifications::all();
    }

    public function markNotification(Request $request, $id)
    {
        auth()->user()->unreadNotifications->where('id', $id)->markAsRead();
        if ($request->has('record_id')) {
            return redirect()->route('users.show', $request->query('record_id'));
        } else {
            return redirect()->route('dashboard');
        }
    }

    public function markAllNotifications()
    {
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();    
    }

    public function destroy(Request $request, $id)
    {
        auth()->user()->notifications()->where('id', $id)->delete();
        return redirect()->back();    
    }
}
