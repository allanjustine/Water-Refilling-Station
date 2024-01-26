<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
protected $fillable = ['user_id', 'product_id', 'quantity', 'other_field1', 'other_field2', /* ... */];

    // Define the relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with the Product model (assuming you have a Product model)
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}