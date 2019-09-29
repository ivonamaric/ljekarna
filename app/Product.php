<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [

        'title',
        'price',
        'quantity',
        'description',
        'category_id',
        'brand_id',
        'file'
    ];

    protected $dates = ['deleted_at'];


    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function photo()
    {
        return $this->belongsTo('App\Photo');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'carts');
    }

    public function getTitleAttribute($value)
    {
        return ucfirst($value);
    }

    public function getFileAttribute($value)
    {
        return "/images/products/" . $value;
    }
}
