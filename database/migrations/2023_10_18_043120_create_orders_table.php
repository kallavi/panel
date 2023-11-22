<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->timestamps();



            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('tc')->nullable();
            $table->string('dob')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('county')->nullable();
            $table->text('address')->nullable();
            $table->text('zip_code')->nullable();
            $table->text('company_title')->nullable();
            $table->text('vd')->nullable();
            $table->string('vkn')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('cart_id')->nullable();
            $table->string('price')->nullable();
            $table->string('amount')->nullable();
            $table->string('total')->nullable();




        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
