<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->boolean('type')->default(false)->nullable(); //add type boolean Users: 0=>User, 1=>Admin, 2=>Manager, 3=>SupAdmin
            $table->string('avatar')->nullable();
            $table->string('address')->nullable();
            $table->text('bio')->nullable();
            $table->decimal('billings', 10, 2)->nullable()->default(0);
            $table->timestamps();
            $table->enum('subscription_type', ['1_month', '1_year'])->default('1_month');

        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
