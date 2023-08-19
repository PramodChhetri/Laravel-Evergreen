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
            $table->foreignId('buyer_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('seller_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->integer('quantity');
            $table->decimal('total_price', 8, 2);
            $table->date('date');
            $table->enum('payment_method', ['Online', 'Cash on Delivery', 'Pending'])->default('Pending');
            $table->string('transaction_token')->nullable();
            $table->string('buyeremail')->nullable();
            $table->string('buyername')->nullable();
            $table->string('buyercontact')->nullable();
            $table->text('buyeraddress')->nullable();
            $table->text('buyercountry')->nullable();
            $table->text('buyerstate')->nullable();
            $table->text('buyerzip')->nullable();
            $table->string('status')->default('Pending');
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
