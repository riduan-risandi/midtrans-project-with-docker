<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BalanceInformation;
use App\Models\BalanceHistory;

class BalanceInformationController extends Controller
{

    public function __construct()
    {  
        $this->saldo = BalanceInformation::get()->first(); 
    }
    public function index()
    {  
        $saldo = $this->saldo;
        // echo '<pre>';
        // print_r($saldo);
        // die;
        
        // echo "<BR> masuk  <BR>"; die; 
        return view('balance.index',compact('saldo'));
    }

    public function deposit()
    { 
        $saldo = $this->saldo;
        return view('balance.deposit',compact('saldo')); 
    }

    public function topup(Request $request)
    {   
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0|not_in:0', 
        ]); 

        $request->request->add([ 'type' =>'1']); 

        $order = BalanceHistory::create($request->all());
 
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
                'gross_amount' => $order->amount,
            ),
            'customer_details' => array(
                // 'name' => $order->name,
                'name' => 'ridwan',
                'email' => 'ridwan@example.com',
                // 'phone' => 088888,
            ),
        );
        // echo '<pre>';
        // print_r($order); 
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // echo '<pre>';
        // print_r($snapToken);
        // die;
        return view('balance/topup',compact('snapToken','order'));
        
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
                $history = BalanceHistory::find($request->order_id);
                
                $history->update(['status'=>'1']);

                $saldoArr = $this->saldo;
                if (empty($saldoArr))
                {  
                    BalanceInformation::create([
                        'amount'              => 0,  
                    ]);  
                }
                            
                $saldoArr = BalanceInformation::get()->first(); 
                $amount = (int) $saldoArr->amount;
                    
                // DEPOSIT
                if ($history->type==1)
                {            
                    BalanceInformation::where('id', $saldoArr["id"])
                    ->update([ 
                        'amount'              => $amount + $history->amount,  
                    ]);   
                         
                }
                else // WITHDRAW
                {

                    BalanceInformation::where('id', $saldoArr["id"])
                    ->update([ 
                        'amount'              => $amount - $history->amount,  
                    ]); 
                }
                
                 

            }

        }
    }

    public function withdraw()
    { 
        $saldo = $this->saldo;
        return view('balance.withdraw',compact('saldo')); 
    }


    public function withdrawal(Request $request)
    {   
        $validated = $request->validate([
            'amount' => 'required|numeric|min:0|not_in:0', 
        ]); 
        $request->request->add([ 'type' =>'2']); 

        $order = BalanceHistory::create($request->all());
 
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
                'gross_amount' => $order->amount,
            ),
            'customer_details' => array(
                // 'name' => $order->name,
                'name' => 'ridwan',
                'email' => 'ridwan@example.com',
                // 'phone' => 088888,
            ),
        );
        // echo '<pre>';
        // print_r($order); 
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // echo '<pre>';
        // print_r($snapToken);
        // die;
        return view('balance/withdrawal',compact('snapToken','order'));
        
    }

    public function invoice( $id)
    {  
        $BalanceHistory = BalanceHistory::find($id);
 
        if (!empty($BalanceHistory))
        {
            $BalanceHistory->type = ($BalanceHistory->type==1 ? 'Deposit' : 'Witdraw') ;
            $BalanceHistory->status = ($BalanceHistory->status==1 ? 'Success' : 'Failed') ;
        }
        // echo '<pre>';
        // print_r($BalanceHistory);
        // die;
        return view('balance/invoice',compact('BalanceHistory'));
    }

}
