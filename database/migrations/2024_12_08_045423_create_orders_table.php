<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('full_name');
            $table->string('address');
            $table->string('contact_no');
            $table->string('email');
            $table->decimal('total_amount', 10, 2);
            $table->enum('payment_method', ['cash_on_delivery', 'credit_card', 'bank_transfer']);
            $table->enum('status', ['pending', 'confirmed', 'shipped', 'delivered', 'cancelled'])->default('pending');
            $table->timestamps();
    
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
