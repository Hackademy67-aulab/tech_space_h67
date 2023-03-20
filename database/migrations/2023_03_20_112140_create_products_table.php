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
        Schema::create('products', function (Blueprint $table) {
            $table->id();//Dice ad Eloquent come gestire tutti gli id
            $table->string('name');
            $table->string('price');
            $table->longText('description');
            $table->timestamps();//Dice ad eloquent di costruire due colonne dedicate alla creazione e aggiornameto dei dati
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
