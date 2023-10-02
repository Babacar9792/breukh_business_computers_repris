<?php

use App\Models\Unite;
use App\Models\Caracteristique;
use App\Models\Produit;
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
        Schema::create('produit_caracteristiques', function (Blueprint $table) {
            $table->id();
            $table->string("valeur");
            $table->foreignIdFor(Caracteristique::class)->constrained();
            $table->foreignIdFor(Unite::class)->nullable();
            $table->foreignIdFor(Produit::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produit_caracteristiques');
    }
};
