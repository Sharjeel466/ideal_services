<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Rate;
use App\Transaction;

class AdminController extends Controller
{
    public function index()
    {
        $user = User::all();

        return view('admin.dashboard', compact('user'));
    }

    public function user()
    {
        $user = User::with('role')->get();
        return view('admin.users.list', compact('user'));
    }

    public function addUser()
    {
        $role = Role::all();
        return view('admin.users.add_user', compact('role'));
    }

    public function createUser(Request $req)
    {
        $data = $req->all();
        User::create([
            'name' => $data['name'],
            'mobile_number' => $data['number'],
            'email' => $data['email'],
            'role_id' => $data['role'],
            'password' => bcrypt($data['password']),
        ]);

        $req->session()->flash('msg', 'User Created Successfully');
        return redirect('admin/user');
    }

    public function delete(Request $req, $id)
    {
        $user = User::find($id);
        $user->delete();

        $req->session()->flash('msg', 'User Deleted Successfully');
        return redirect('admin/user');
    }

    public function rate()
    {
        $rate = Rate::first();
        return view('admin.rate.list', compact('rate'));
    }

    public function rateChange(Request $req)
    {
        $rate = Rate::where('id', 1)->first();
        $rate->rate = $req->rate;
        $rate->update();

        $req->session()->flash('msg', 'Rate Updated Successfully');
        return redirect('admin/rate');
    }

    public function transaction()
    {
        $user = User::where('role_id', '!=', 1)->get();
// $user = json_decode(json_encode($user));
// debug($user);die();
        $transactions = Transaction::with('user')->get();
        return view('admin.transactions.list', compact('transactions', 'user'));
    }

    public function userSearch(Request $req)
    {
        $data = $req->all();
        $user = Transaction::with('user')->where('user_id', $data['user'])->get();
        return $user;
    }

    public function clientSearch(Request $req)
    {
        $data = $req->all();
        $client = Transaction::with('user')
        ->where('customer', 'like', '%'.$data['client'].'%')
        ->orWhere('mobile_number', 'like', '%'.$data['client'].'%')
        ->get();
        return $client;   
    }
}
