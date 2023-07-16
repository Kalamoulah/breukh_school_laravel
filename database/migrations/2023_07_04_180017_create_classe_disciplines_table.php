<?php

use App\Models\AnneeScolaire;
use App\Models\Classe;
use App\Models\Discipline;
use App\Models\Evaluation;
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
        Schema::create('classe_disciplines', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Discipline::class);
            $table->foreignIdFor(Classe::class);
            $table->foreignIdFor(AnneeScolaire::class)->constrained();
            $table->foreignIdFor(Evaluation::class);
            $table->integer('noteMax');
            $table->boolean('etat')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classe_disciplines');
    }
};
