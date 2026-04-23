<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dossiers', function (Blueprint $table) {
            $table->id();
            $table->morphs('operateur'); // Creates operateur_id and operateur_type
            $table->foreignId('secteur_id')->constrained('secteurs')->onDelete('restrict');
            $table->decimal('montant', 15, 2);
            $table->boolean('domiciliation')->default(false);
            $table->text('remarque')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dossiers');
    }
};
