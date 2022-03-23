<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Media;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        // Show incoming events
        $events = Event::where('end', '>', Carbon::now())->take(4)->get();
        $today_events = Event::where('end', Carbon::now())->take(4)->get();

        $media1 = Media::with('event')->latest()->take(5)->get();
        $media2 = Media::with('event')->inRandomOrder()->take(5)->get();

        return view('welcome', compact('events', 'today_events', 'media1', 'media2'));
    }
}
