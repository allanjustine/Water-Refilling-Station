<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Laravel\Cashier\Billable;

use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'bio',
        'avatar',
        'phone',
        'address',
        'municipality',
        'station',
        'subscription_type',
        'billings'
    ];


    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Interact with the user's first name.
     *
     * @param  string  $value
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    protected function type(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  ["user", "admin", "WRF", "Not Approve", "Disabled"][$value],
        );
    }

        //View User
    public function showUserInfo($userId)
    {
        $user = User::find($userId);

        // Check if the user exists
        if (!$user) {
            abort(404, 'User not found');
        }

        return view('admin.profile', ['user' => $user]);
    }


    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function chats()
    {
        return $this->hasMany(ChMessage::class);
    }
    public function products()
    {
    return $this->hasMany(Product::class);
    }
    public function invoices()
    {
    return $this->hasMany(Invoice::class);
    }




}
