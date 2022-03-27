<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\Media;
use App\Models\Brands;
use Illuminate\Http\Request;

use Spatie\Sitemap\SitemapGenerator;
use Artesaos\SEOTools\Facades\SEOTools;

class WelcomeController extends Controller
{
    public function index()
    {
        SEOTools::setTitle('Reserva tickets para eventos usando Bitcoin LN ⚡️');
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::twitter()->setSite('@BitKets');
        SEOTools::jsonLd()->addImage(asset('BitKets.png'));

        // Show incoming events
        $events = Event::where('end', '>', Carbon::now())->take(4)->get();
        $today_events = Event::where('end', Carbon::now())->take(4)->get();

        $media1 = Media::with('event')->latest()->take(5)->get();
        $media2 = Media::with('event')->inRandomOrder()->take(5)->get();

        $brands = Brands::take(4)->inRandomOrder()->get();

        return view('welcome', compact('events', 'today_events', 'media1', 'media2', 'brands'));
    }

    /**
     * Generate Sitemap in the public root folder
     */
    public function generate_sitemap()
    {
        SitemapGenerator::create('https://bitkets.com')->writeToFile('sitemap.xml');
    }
}
