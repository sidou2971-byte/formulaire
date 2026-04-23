<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dossier_banque', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dossier_id')->constrained('dossiers')->onDelete('cascade');
            $table->foreignId('banque_id')->constrained('banques')->onDelete('cascade');
            $table->unique(['dossier_id', 'banque_id']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dossier_banque');
    }
};
