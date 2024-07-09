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
        Schema::create('equipment', function (Blueprint $table) {
            $table->id();
            $table->String('name');
            $table->String('stadium');
            $table->int('capacity');
            $table->year('year');
            $table->String('city');

             //Atributos foraneos
             $table->unsignedBigInteger('player_id')->nullable();

             //Referencia
             $table->foreign('player_id')
                ->references('id')
                ->on('players')->onDelete('set null');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipment');
    }
};
