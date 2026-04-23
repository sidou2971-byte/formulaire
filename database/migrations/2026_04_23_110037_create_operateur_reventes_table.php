<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('operateur_reventes', function (Blueprint $table) {
            $table->id();
            $table->string('rc')->unique();
            $table->string('mot_de_passe');
            $table->string('telephone', 50)->nullable();
            $table->string('raison_sociale');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('operateur_reventes');
    }
};
