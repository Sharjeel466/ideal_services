<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Transaction extends Model
{
    protected $fillable = ['user_id', 'mobile_number', 'sar', 'rate', 'total', 'status', 'transaction_id', 'customer'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
