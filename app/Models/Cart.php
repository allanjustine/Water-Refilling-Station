<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'product_id', 'quantity', 'other_field1', 'other_field2', /* ... */];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Accessor for total price of the cart item
    public function getTotalAttribute()
    {
        return $this->quantity * $this->product->price;
    }

    // Helper method to update the quantity of a cart item
    public static function updateQuantity($cartItemId, $quantity)
    {
        $cartItem = self::findOrFail($cartItemId);
        $cartItem->quantity = $quantity;
        $cartItem->save();

        return $cartItem;
    }

    // Helper method to get the total number of items in the cart for a user
    public static function getTotalItemsForUser($userId)
    {
        return self::where('user_id', $userId)->sum('quantity');
    }

    //CART COUNT
    public function getCartCount()
    {
        // Logic to get cart count for the authenticated user
        $user = auth()->user();
        $cartCount = Cart::where('user_id', $user->id)->count();

        return $cartCount;
    }

    public static function getProductQuantityForUser($userId, $productId)
    {
        return self::where('user_id', $userId)
            ->where('product_id', $productId)
            ->value('product_quantity');
    }

}
