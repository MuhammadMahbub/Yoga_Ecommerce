<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\RefunAdmindMail;
use App\Mail\RefundMail;
use App\Models\Order;
use App\Models\StripeSetting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class RefundController extends Controller
{
    public function refundFull($id)
    {
        $order  = Order::find($id);
        $stripe = StripeSetting::first();
        // $stripekeys = StripeSetting::first();
        // $stripe = \Stripe\Stripe::setApiKey($stripekeys->secret_key);

        // $charge_id = $order->charge_id;
        // $amount =  $order->order_total * 100;
        // $refund = \Stripe\Refund::create([
        //         'charge' => $charge_id,
        //         // 'amount' => $amount *100,  // For 10 $
        //         'reason' => 'Full Refund'
        // ]);

        // $balanceTransaction = \Stripe\BalanceTransaction::retrieve($refund->balance_transaction);

        // return $balanceTransaction;
        $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, 'https://api.stripe.com/v1/refunds');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, "charge=".$order->charge_id);
            curl_setopt($ch, CURLOPT_USERPWD, $stripe->stripe_secret . ':' . '');

            $headers = array();
            $headers[] = 'Content-Type: application/x-www-form-urlencoded';
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $result = curl_exec($ch);
            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            }
            curl_close($ch);

            $result = json_decode($result, true);

            $order->order_status   = 'refunded';
            $order->refund_id      = $result['id'];
            $order->refund_amount  = $result['amount']/100;
            $order->save();


            if (getEmailSetting()) {
                Mail::to($order->shipping_email)->send(new RefundMail($order));
    
                $users = User::get();
    
                foreach ($users as $user) {
                    Mail::to($user->email)->send(new RefunAdmindMail($order));
                }
            }

            return back()->withSuccess("{{ __('Payment refunded. It may take a few days for the money to reach the customer's bank account.') }}");


    }

    public function refundPartial(Request $request)
    {

        $order  = Order::find($request->id);
        $amount = $request->amount * 100;
        $stripe = StripeSetting::first();
        $stripekeys = StripeSetting::first();
        $stripe = \Stripe\Stripe::setApiKey($stripekeys->stripe_secret);
        $charge_id = $order->charge_id;

        $refund = \Stripe\Refund::create([
                'charge' => $charge_id,
                'amount' => $amount,  // For 10 $
        ]);

        $balanceTransaction = \Stripe\BalanceTransaction::retrieve($refund->balance_transaction);

        if($order->refund_amount)
        {
            $order->order_status   = 'partially refunded';
            $order->refund_id   = $balanceTransaction->source;
            $order->txn_id      = $balanceTransaction->id;
            $order->refund_amount = $order->refund_amount + $request->amount;
            $order->save();
            if($order->order_total == $order->refund_amount)
            {
                $order->order_status   = 'refunded';
                $order->save();
            }
        }
        else
        {
            $order->order_status   = 'partially refunded';
            $order->txn_id      = $balanceTransaction->id;
            $order->refund_id          = $balanceTransaction->source;
            $order->refund_amount  = $request->amount;
            $order->save();
            if($order->order_total == $order->refund_amount)
            {
                $order->order_status   = 'refunded';
                $order->save();
            }
        }

        if (getEmailSetting()) {
            Mail::to($order->shipping_email)->send(new RefundMail($order));

            $users = User::get();

            foreach ($users as $user) {
                Mail::to($user->email)->send(new RefunAdmindMail($order));
            }
        }


        return back()->withSuccess( __("Order partially refunded."));

    }
}
