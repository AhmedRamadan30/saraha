<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function send(int $id) {
        $user = User::findOrFail($id);

        if ($user->id != Auth::id()) {
//            $user->visits()->create();
            if ($user->visits()->count() < 10) {
                Visit::create(['user_id' => $id]);
            } else {
                Visit::where('user_id', $id)->first()->delete();
                Visit::create(['user_id' => $id]);
            }
        }

        return view('send', compact('user'));
    }

    public function store(Request $request, int $id) {
        $request->validate([
           'text'   => 'required'
        ]);

        // store message in db
        Message::create([
            'text' => $request->text,
            'user_id'   => $id
        ]);
        // redirect to any route you want
        return redirect()->route('login')->with('success', 'message has been sent successfully');
    }
}
