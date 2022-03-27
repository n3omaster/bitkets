<?php

namespace App\Http\Controllers;

use DateTime;
use Carbon\Carbon;

use App\Models\Cart;
use App\Models\Event;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Database\Eloquent\Builder;


class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Seo elements
        SEOTools::setTitle('Eventos disponibles para esta semana, entradas con Bitcoin ⚡️');
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::twitter()->setSite('@BitKets');
        SEOTools::jsonLd()->addImage(asset('BitKets.png'));

        // Events listing by latest and more important
        $events = Event::orderBy('start', 'asc')->paginate(10);

        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        SEOTools::setTitle('Reserva tickets para ' . $event->name . ' con ⚡️');
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::twitter()->setSite('@BitKets');
        SEOTools::jsonLd()->addImage(asset('BitKets.png'));
        SEOTools::jsonLd()->setType('Event');
        SEOTools::jsonLd()->addValue('startDate', Carbon::parse($event->start)->format(DateTime::ATOM));
        SEOTools::jsonLd()->addValue('name', $event->name);

        $buyers = Cart::where('status', 'paid')->whereHas('ticket', function (Builder $query) use ($event) {
            return $query->where('event_id', $event->id);
        })->with('owner')->take(5)->latest()->get();

        return view('events.show', compact('event', 'buyers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        //
    }
}
