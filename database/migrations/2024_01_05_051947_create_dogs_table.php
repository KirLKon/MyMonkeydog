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
        Schema::create('dogs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->boolean('sex');
            $table->date('dob');
            $table->unsignedBigInteger('kennel')->default(0);
            $table->boolean('show_on_site')->default(0);
            $table->string('ranks',1000)->nullable();
            $table->string('image_path')->default('dogs');
            $table->string('main_image');
            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dogs');
    }
};
