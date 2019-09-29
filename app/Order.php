<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $fillable = ['transaction_id', 'user_id', 'quantity'];

    public function product()
    {
        return $this->belongsTo('App\Product')->withTrashed();
    }
}
