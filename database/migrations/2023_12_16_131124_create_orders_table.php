<?php

// database/migrations/2023_01_03_create_orders_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('product_id')->constrained();
            $table->integer('order_quantity')->default(1); // Add the quantity column
            $table->enum('status', ['Pending', 'On Process', 'For Delivery', 'Delivered', 'Paid', 'Cancelled'])->default('Pending');
            $table->string('image')->nullable();
            $table->string('borrow')->nullable();
            $table->string('own')->nullable();
            $table->string('buy')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('reference_number')->nullable();
            $table->string('reason')->nullable();
            $table->timestamps();
            $table->string('product_status')->default('Approve');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
