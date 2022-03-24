<?php

namespace App\Http\Controllers\Api;

use App\Models\Wallet;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class LightningController extends Controller
{
    private static $url = "https://api.nowpayments.io/v1";

    /**
     * Get a wallet invoice
     * @param $amount in USD
     */
    public static function get_wallet($amount)
    {
        // Calculate value
        $amount = floatval($amount) * 1.02;
        $satoshi_amount = self::get_sats_value($amount);

        $params = [
            'num_satoshis' => $satoshi_amount,
            'memo' => "BitKets"
        ];

        //Getting a new Wallet
        $response = Http::withHeaders([
            'X-Api-Key' => config('lnprovider.secret_token')
        ])->post(config('lnprovider.provider'), $params);

        // Get Wallet data
        $wallet = json_decode((string) $response->getBody());

        return $wallet;
    }

    /**
     * Webhook for LNProvider
     */
    public function webhook(Request $request)
    {
        // Event Name
        $event_name = $request['event']['name'];
        $num_sats = $request['data']['wtx']['num_satoshis'];

        // Convert into BTC value
        $received = number_format($num_sats / 100000000, 8);
        //$ln_deposit = $request['data']['wtx']['wtxType']['name'];
        $ln_address = $request['data']['wtx']['lnTx']['payment_request'];

        // Confirmation
        $txid = $request['data']['wtx']['lnTx']['payment_preimage'];

        // Get transaction from wallet
        $wallet = Wallet::where('wallet', $ln_address)->where('status', '!=', 'paid')->where('wallet_type', 'BTCLN')->with('transaction')->first();

        // Existing Wallet
        if ($wallet) {

            if ($event_name == "wallet_receive") {

                //Release the payment and set all this as paid
                $wallet->received = $received;
                $wallet->txid = $txid;
                $wallet->status = 'paid';
                $wallet->save();

                // Check Price and verify received amount
                $price = self::get_sats_value();
                $amount = number_format($received * $price, 2);

                // If received is superior, just cut heads
                if ($amount >= $wallet->transaction->amount) {
                    $amount = $wallet->transaction->amount;
                }

                //Update Transaction data
                $wallet->transaction->paid($amount);

                // Check not credited Balance
                if($wallet->transaction->status != 'paid') {
                    // Assign balance
                    $wallet->transaction->owner->increase_balance($amount, true, $wallet->transaction);
                }

                return response($wallet->id);
            }

        } else {
            abort(403);
        }
    }

    /**
     * Get a Bitcoin Price estimate
     * @param $amount in USD
     */
    public static function get_sats_value($amount)
    {
        $url = self::$url . '/estimate?amount=' . $amount . '&currency_from=USD&currency_to=BTC';
        $estimated_amount = Http::withHeaders(['x-api-key' => config('lnprovider.nowpayments_token')])->get($url)['estimated_amount'];

        return $estimated_amount * 100000000;
    }
}
