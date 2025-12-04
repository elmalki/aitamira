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
        Schema::create('drinks', function (Blueprint $table) {
            $table->id();
            $table->string('n_dossier');
            $table->string('etablissement')->nullable();
            $table->integer('ca_estime')->nullable();
            $table->date('date_cessation')->nullable();
            $table->string('motif')->nullable();
            $table->foreignIdFor(\App\Models\TaxPayer::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drinks');
    }
};
