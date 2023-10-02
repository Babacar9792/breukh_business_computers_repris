<?php

use App\Models\Utilisateur;
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
        Schema::create('commandes', function (Blueprint $table) {
            $table->id();
            $table->string("numero_commande")->default(time());
            $table->enum("etat_commande", ["IN PROGRESS", "ACCEPTED", "REJECT"])->default("IN PROGRESS");
            $table->foreignIdFor(Utilisateur::class)->constrained();
            $table->date("date_commande")->default(now());
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commandes');
    }
};
