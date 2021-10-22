<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rate;
use App\User;
use App\Transaction;
use Auth;

class SaudiaController extends Controller
{
    public function transaction()
    {
        $user_id = Auth::user()->id;
        $transactions = Transaction::with('user')->where('user_id', $user_id)->get();
        // $transactions = json_decode(json_encode($transactions));
        // debug($transactions);die();
        return view('saudia.transactions.list', compact('transactions'));
    }

    public function addTransaction()
    {
        $rate = Rate::first();
        return view('saudia.transactions.add_transaction', compact('rate'));
    }

    public function createTransaction(Request $req)
    {
        $data = $req->all();
        
        $user_id = Auth::user()->id;

        Transaction::create([
            'user_id'        => $user_id,
            'mobile_number'  => $data['number'],
            'sar'            => $data['sar'],
            'rate'           => $data['rate'],
            'total'          => $data['total_amount'],
            'status'         => 0,
            'customer'       => 0,
            'transaction_id' => 0,
        ]);

        return redirect('saudia/transaction')->with('msg', 'A new Transaction has added');
    }

    public function saudiaClient(Request $req)
    {
        $user_id = Auth::user()->id;
        $data = $req->all();
        $client = Transaction::with('user')
        ->where('user_id', $user_id)
        ->where('mobile_number', 'like', '%'.$data['client'].'%')
        ->orWhere('customer', 'like', '%'.$data['client'].'%')
        ->get();
        return $client;   
    }
}
