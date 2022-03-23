<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class LightningController extends Controller
{
    public function __construct()
    {
    }

    /**
     * Get a wallet invoice
     */
    public function get_wWallet($amount)
    {

        // Calculate value
        $amount = floatval($amount) * 1.02;
        $satoshi_amount = $this->amount($amount);

        $params = [
            'num_satoshis' => $satoshi_amount * 100000000,
            'memo' => "BitKets"
        ];

        //Getting a new Wallet
        $response = Http::withHeaders([
            'X-Api-Key' => config('lnprovider.secret_token')
        ])->post(config('lnprovider.provider'), $params);

        // Get Wallet data
        $wallet = json_decode((string) $response->getBody());

        // Check for correcta wallet validation
        if (isset($wallet->payment_request)) {

            dd($wallet);

            // Everything OK
            return $response;
        }
    }

    /**
     * Get a Bitcoin Price estimate
     */
    public function get_sats_value($usd_value)
    {
    }
}
