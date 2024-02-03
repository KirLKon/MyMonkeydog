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
        Schema::create('puppy_images', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('puppy_id');
            $table->string('image_name');
            $table->timestamps();

            $table->index('puppy_id','puppy_image_puppy_idx');
            $table->foreign('puppy_id','puppy_image_puppy_fk')->on('puppies')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puppy_images');
    }
};
