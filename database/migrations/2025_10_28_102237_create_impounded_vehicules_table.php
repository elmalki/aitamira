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
        Schema::create('impounded_vehicules', function (Blueprint $table) {
            $table->id();
            $table->string('licence_plate');
            $table->string('payment_receipt_number')->nullable();
            $table->string('condition');
            $table->date('payment_date')->nullable();
            $table->date('entry_date')->nullable();
            $table->date('leave_date')->nullable();
            $table->date('auction_date')->nullable();
            $table->string('status')->nullable();
            $table->foreignIdFor(\App\Models\VehiculeType::class)->nullable();
            $table->foreignIdFor(\App\Models\Depositor::class)->nullable();
            $table->foreignIdFor(\App\Models\AuctionGroup::class)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('impounded_vehicules');
    }
};
