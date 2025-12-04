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
        Schema::create('auction_sales', function (Blueprint $table) {
            $table->id();
            $table->string('sale_receipt_number')->nullable();
            $table->decimal('sale_amount',10,2)->nullable();
            $table->decimal('sale_percentage')->nullable();
            $table->string('sale_receipt_scan_url')->nullable();
            $table->foreignIdFor(\App\Models\ImpoundedVehicule::class);
            $table->foreignIdFor(\App\Models\AuctionGroup::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('auction_sales');
    }
};
