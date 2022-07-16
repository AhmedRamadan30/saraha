<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $messages = Message::where('user_id', Auth::id())->latest()->paginate(10);
        $visits = Visit::where('user_id', Auth::id())->count();
        return view('home', compact('messages', 'visits'));
    }

    public function lastTenVisitsDate() {
        $visits = Visit::where('user_id', Auth::id())->latest()->take(10)->get();
        $visit_numb = Visit::where('user_id', Auth::id())->count();
        return view('last_ten_visits_date', compact('visits', 'visit_numb'));
    }
}
