<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('stock')->nullable();       // integer
            $table->float('price')->nullable();         // float
            $table->string('name')->nullable();         // string
            $table->date('manufactured_date')->nullable(); // date
            $table->text('description')->nullable();    // text
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
