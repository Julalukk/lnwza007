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
        Schema::table('covid19s', function (Blueprint $table) {
            $table->float('a', 16, 2)->nullable();          
            $table->float('remark', 16, 2)->nullable();     
            $table->float('c', 16, 2)->nullable();
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('covid19s', function (Blueprint $table) {
            //
        });
    }
};
