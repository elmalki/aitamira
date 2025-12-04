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
        Schema::create('terrains', function (Blueprint $table) {
            $table->id();
            $table->string('titre_foncier')->nullable();
            $table->string('emplacement');
            $table->string('n_lot')->nullable();
            $table->string('n_construction')->nullable();
            $table->date('date_construction_emission')->nullable();
            $table->date('date_construction_expiration')->nullable();
            $table->boolean('statut_construction')->default(false);
            $table->string('n_habiter')->nullable();
            $table->date('date_habiter_emission')->nullable();
            $table->integer('surface')->unsigned();
            $table->foreignIdFor(\App\Models\Zone::class);
            $table->foreignIdFor(\App\Models\TaxPayer::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('terrains');
    }
};
