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
use App\Notifications\TicketPaid;
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
    public $price_id = "";

    /**
     * Validation rules for incoming data
     */
    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'promo_code' => 'required',
    ];

    /**
     * Custom messages to the validation fails
     */
    protected $messages = [
        'name.required' => 'Escriba su nombre correctamente',
        'name.min' => 'Debe enviar un nombre válido',
        'email.required' => 'Debe enviar una dirección de correo',
        'email.email' => 'Debe enviar una dirección de correo válida',
    ];

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
        // Validate submitted data
        $this->validate();

        $this->show_buy_form = false;
        //$this->show_qr = true;
        $this->completed = true;

        // Generate a new and unique Ticket Coupon
        $this->ticket = Str::upper(Str::random(8));

        // Search for this user in the database
        $user = User::where('email', $this->email)->first();

        // If the user doesn't exist, create a new user
        if (!$user) {
            $user = User::create([
                'name' => $this->name,
                'email' => $this->email,
                'password' => Hash::make(Str::random(8)),
            ]);
        }

        // Save this ticket into the cart table
        $cart_paid = Cart::create([
            'user_id' => $user->id,
            'price_id' => $this->event->price[0]->id,
            'confirmation' => $this->ticket,
            'status' => 'paid'
        ]);

        // Notify this user with the ticket code
        $user->notify(new TicketPaid($cart_paid));

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
