<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class PakistanController extends Controller
{
    public function transaction()
    {
        $transactions = Transaction::with('user')->get();
        return view('pakistan.transactions.list', compact('transactions'));
    }

    public function editTransaction($id)
    {
        $transaction = Transaction::with('user')->where('id', $id)->first();
        
        return view('pakistan.transactions.add_transaction', compact('transaction'));
    }

    public function updateTransaction(Request $req)
    {
        $data = $req->all();

        $transaction = Transaction::find($data['id']);
        $transaction->customer = $data['client_name'];
        $transaction->transaction_id = $data['transaction_id'];
        $transaction->status = 1;
        $transaction->update();

        return redirect('pakistan/transaction')->with('msg', 'Transaction Updated Successfully');
    }

    public function pakistanClient(Request $req)
    {
        $data = $req->all();
        $client = Transaction::with('user')
        ->where('customer', 'like', '%'.$data['client'].'%')
        ->orWhere('mobile_number', 'like', '%'.$data['client'].'%')
        ->get();
        return $client;   
    }
}
