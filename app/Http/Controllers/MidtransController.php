<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Configurations
use App\Http\Controllers\Midtrans\Config;

// Midtrans API Resources
use App\Http\Controllers\Midtrans\Transaction;

// Plumbling
use App\Http\Controllers\Midtrans\ApiRequestor;
use App\Http\Controllers\Midtrans\SnapApiRequestor;
use App\Http\Controllers\Midtrans\Notification;
use App\Http\Controllers\Midtrans\CoreApi;
use App\Http\Controllers\Midtrans\Snap;

// Sanitization
use App\Http\Controllers\Midtrans\Sanitizer;


class MidtransController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    //
    public function getSnapToken(Request $req){

        $item_list = array();
        $amount = 0;
        $serverKey = '';
        $finishURL = '';
        $redirectURL = '';
        if(env('APP_ENV') == 'prod')
        {
            // Enable Production
            Config::$isProduction = true;
            $serverKey = env('SERVER_KEY_MIDTRANS_PROD');
            $redirectURL = env('REDIRECT_URL_TOKEN_MIDTRANS_PROD');
        }
        else if(env('APP_ENV') == 'dev')
        {
            $serverKey = env('SERVER_KEY_MIDTRANS_DEV');
            $redirectURL = env('REDIRECT_URL_TOKEN_MIDTRANS_DEV');
        }

        Config::$serverKey = $serverKey;
        if (!isset(Config::$serverKey)) {
            return "Please set your payment server key";
        }
        Config::$isSanitized = true;

        // Enable 3D-Secure
        Config::$is3ds = true;
        
        // Required
        $item_list[] = [
          "id" => "ITEM1",
          "price" => 10000,
          "quantity" => 1,
          "name" => "Midtrans Bear",
          "brand" => "Midtrans",
          "category" => "Toys",
          "merchant_name" => "Midtrans"
        ];
        $item_list[] = [
          "id" => "ITEM2",
          "price" => 15000,
          "quantity" => 1,
          "name" => "Midtrans Tara Bear",
          "brand" => "Midtrans",
          "category" => "Toys",
          "merchant_name" => "Midtrans"
        ];

        $transaction_details = array(
            'order_id' => rand(),
            'gross_amount' => 20000, // no decimal allowed for creditcard
        );

        // Optional
        $item_details = $item_list;

        // Optional
        $billing_address = array(
            'first_name'    => "Andri",
            'last_name'     => "Litani",
            'address'       => "Mangga 20",
            'city'          => "Jakarta",
            'postal_code'   => "16602",
            'phone'         => "081122334455",
            'country_code'  => 'IDN'
        );

        // Optional
        $shipping_address = array(
            'first_name'    => "Obet",
            'last_name'     => "Supriadi",
            'address'       => "Manggis 90",
            'city'          => "Jakarta",
            'postal_code'   => "16601",
            'phone'         => "08113366345",
            'country_code'  => 'IDN'
        );

        // Optional
        $customer_details = array(
            'first_name'    => "Andri",
            'last_name'     => "Litani",
            'email'         => "andri@litani.com",
            'phone'         => "081122334455",
            'billing_address'  => $billing_address,
            'shipping_address' => $shipping_address
        );

        // Optional, remove this to display all available payment methods
        $enable_payments = ["credit_card", "cimb_clicks",
        "bca_klikbca", "bca_klikpay", "bri_epay", "echannel", "permata_va",
        "bca_va", "bni_va", "bri_va", "other_va", "gopay", "indomaret",
        "danamon_online", "akulaku", "shopeepay"];

        // Fill transaction details
        $transaction = array(
            'enabled_payments' => $enable_payments,
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
            'item_details' => $item_details,
        );
        // return $transaction;
        try {
            $snapToken = Snap::getSnapToken($transaction);
            $result = [];
            $result['token'] = $snapToken;
            $result['redirect_url'] = $redirectURL.$snapToken;
            return response()->json($result);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }

    }
}