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
        Schema::disableForeignKeyConstraints();
        Schema::create('commande_produit', function (Blueprint $table) {
            $table->primary(['produit_id', 'commande_id']);
            $table->integer('quantite');
            $table->float('prix');
            $table->timestamps();
            $table->unsignedBigInteger('produit_id');
            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade');
            $table->unsignedBigInteger('commande_id');
            $table->foreign('commande_id')->references('id')->on('commandes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('détails_commandes');
    }
};
