<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'price', 'product_quantity'];

    // Other model code...
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class); // 'withDefault' makes sure a default User instance is created if the relationship is null.
    }


    protected static function boot()
    {
        parent::boot();

        // Registering the deleting event
        static::deleting(function ($product) {
            // Remove orders related to this product
            $product->orders()->delete();
        });
    }

}
