<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Event;

use BaconQrCode\Writer;

use Livewire\Component;
use Illuminate\Support\Str;
use BaconQrCode\Renderer\Color\Rgb;
use Illuminate\Support\Facades\Hash;
use BaconQrCode\Renderer\ImageRenderer;
use BaconQrCode\Renderer\RendererStyle\Fill;
use BaconQrCode\Renderer\Image\SvgImageBackEnd;
use App\Http\Controllers\Api\LightningController;
use App\Models\Cart;
use BaconQrCode\Renderer\RendererStyle\RendererStyle;

class BuyTicket extends Component
{

    public $name = "";
    public $email = "";
    public Event $event;
    public $buyers;
    public $show_buy_form = false;
    public $show_qr = false;
    public $completed = false;
    public $promo_code = "";
    public $qr = "";
    public $svg = "";
    public $ticket = "";

    /**
     * Initialize vars
     */
    public function mount(Event $event, $buyers)
    {
        $this->event = $event;
        $this->buyers = $buyers;
    }

    /**
     * Begin Buy process
     */
    public function show_buy_form()
    {
        $this->show_buy_form = true;
        $this->show_qr = false;
    }

    /**
     * Buy a ticket
     */
    public function buy()
    {
        $this->show_buy_form = false;
        //$this->show_qr = true;
        $this->completed = true;

        // Generate a new and unique Ticket Coupon
        $this->ticket = Str::upper(Str::random(40));

        // Search for this user in the database
        $user = User::where('email', $this->email)->first();

        // If the user doesn't exist, create a new user
        if (!$user) {
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make(Str::random(40)),
            ]);
        }

        // Save this ticket into the cart table
        Cart::create([
            'user_id' => $user->id,
            'event_id' => $this->event->id,
            'confirmation' => $this->ticket,
            'status' => 'paid'
        ]);

        // Send email to the buyer with the ticket code
        $this->send_email($user, $this->ticket);

        /*
        // get a wallet from LightningController
        $wallet = LightningController::get_wallet(1);

        // SVG generator
        $svg = (new Writer(new ImageRenderer(new RendererStyle(300, 1, null, null, Fill::uniformColor(new Rgb(255, 255, 255), new Rgb(45, 55, 72))), new SvgImageBackEnd)))->writeString($wallet->payment_request);

        $this->qr = trim(substr($svg, strpos($svg, "\n") + 1));
        */
    }

    /**
     * Render view
     */
    public function render()
    {
        return view('livewire.buy-ticket');
    }
}
