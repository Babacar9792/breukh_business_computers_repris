<?php

use App\Models\Commande;
use App\Models\SuccursaleProduit;
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
        Schema::create('commande_produits', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("prix_vente");
            $table->bigInteger("quantite");
            $table->foreignIdFor(Commande::class)->constrained();
            $table->foreignIdFor(SuccursaleProduit::class)->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commande_produits');
    }
};
