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
        Schema::create('puppies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('litter_id');
            $table->string('name');
            $table->boolean('sex');
            $table->boolean('show_on_site')->default(1);
            $table->boolean('available')->default(1);
            $table->string('image_path')->default('puppies');
            $table->string('main_image');
            $table->string('color')->nullable();
            $table->string('owner')->nullable();
            $table->string('owner_phone')->nullable();
            $table->string('country_ru')->nullable();
            $table->string('country_en')->nullable();
            $table->string('city_ru')->nullable();
            $table->string('city_en')->nullable();
            $table->string('lon')->nullable();
            $table->string('lat')->nullable();
            $table->boolean('show_on_map')->default(0);
            $table->timestamps();

            $table->softDeletes();

            $table->index('litter_id','puppy_litter_idx');
            $table->foreign('litter_id','puppy_litter_fk')->on('litters')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('puppies');
    }
};
