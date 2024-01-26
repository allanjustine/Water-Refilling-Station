<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['product_id', 'user_id', 'status', 'approved', 'image', 'order_quantity', 'jug_status'];

    // Define relationships or other methods if necessary
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Additional order statuses
    const STATUS_FOR_DELIVERY = 'for_delivery';
    const STATUS_DELIVERED = 'delivered';
}
