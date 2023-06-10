<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    { 
        return view('home');
    }

    public function checkout(Request $request)
    {   
        $request->request->add(['total_price' => $request->qty * 100000, 'status' =>'Unpaid']);

        $order = Order::create($request->all());

        
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to tsnapTokenrue
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $order->id,
                'gross_amount' => $order->total_price,
            ),
            'customer_details' => array(
                'name' => $order->name,
                // 'last_name' => 'pratama',
                // 'email' => 'budi.pra@example.com',
                'phone' => $order->phone,
            ),
        );

        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // echo '<pre>';
        // print_r($snapToken);
        // die;
        return view('checkout',compact('snapToken','order'));
        
    }

    public function callback(Request $request)
    {  
        // echo '<pre>';
        // print_r($request->all());
        // die;
        $serverKey = config('midtrans.server_key');
        $hashed = hash("sha512",$request->order_id.$request->status_code.$request->gross_amount.$serverKey);

        if ($hashed == $request->signature_key)
        {
            if ($request->transaction_status == 'capture')
            {
                $order = Order::find($request->order_id);
                $order->update(['status'=>'Paid']);

            }

        }
    }

    public function invoice( $id)
    {  
        $order = Order::find($id);
        return view('invoice',compact('order'));
    }
}
