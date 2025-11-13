<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('instruments', function (Blueprint $table) {
            $table->id()->notNUll();
            $table->string('name', 255)->nullable()->default(null);
            $table->text('description')->nullable()->default(null);
            $table->string('brand', 255)->nullable()->default(null);
            $table->integer('price')->nullable()->default(null);
            $table->integer('quantity')->nullable()->default(null);



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instruments');
    }
};
