<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('d10s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dossier_id')->constrained('dossiers')->onDelete('cascade');
            $table->string('pays_origine')->nullable();
            $table->string('pays_expediteur')->nullable();
            $table->decimal('montant', 15, 2)->nullable();
            $table->decimal('quantite', 15, 2)->nullable();
            $table->string('piece_jointe')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('d10s');
    }
};
