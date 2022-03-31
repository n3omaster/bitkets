<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class TicketsController extends Controller
{

    /**
     * Middleware rules
     */
    public function __construct()
    {
        $this->middleware('auth');

        //if(Auth::user()->id !== 1) {
        //    abort(403, 'Unauthorized action.');
        //}
    }

    /**
     * Show and export the current tickets of a certain event
     */
    public function export_userbase(Request $request)
    {
        // get all Tickets for a specific event with userdata
        $tickets = Cart::whereHas('ticket', function(Builder $query) {
            return $query->where('event_id', 1);             // Manually event id passed as parameter
        })->with(['owner', 'ticket'])->get();

        return view('admin.tickets.export_userbase', compact('tickets'));
    }
}
