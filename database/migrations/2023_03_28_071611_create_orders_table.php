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
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('shipping_phonenumber');
            $table->string('shipping_city');
            $table->string('shipping_postalcode');
            $table->string('shipping_address');
            $table->dateTime('shipping_tglpemesanan');
            $table->text('shipping_note');
            $table->integer('total_harga');
            $table->string('invoice')->unique();
            $table->string('status_pemesanan');
            $table->enum('status', ['Unpaid', 'Paid']);
            $table->string('snapToken')->nullable();
            $table->timestamps();
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
