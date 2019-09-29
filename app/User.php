<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'photo_id', 'role_id', 'is_active', 'file',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function products()
    {
        return $this->hasMany('App\Product');
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function cart_products()
    {
        return $this->belongsToMany('App\Product', 'carts', 'user_id', 'product_id')->withPivot('quantity');
    }

    public function isAdmin()
    {
        if (($this->role->name == 'admin' && $this->is_active == 1) || ($this->role->name == 'moderator' && $this->is_active == 1)) {

            return true;
        }

        return false;
    }

    public function getNameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getFileAttribute($value)
    {
        return "/images/users/" . $value;
    }
}
