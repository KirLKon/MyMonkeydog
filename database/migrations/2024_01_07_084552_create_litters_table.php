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
        Schema::create('litters', function (Blueprint $table) {
            $table->id();
            $table->string('letter');
            $table->unsignedBigInteger('sir_dog_id');
            $table->unsignedBigInteger('dam_dog_id');
            $table->date('dob');
            $table->string('image_path')->default('litter');
            $table->string('presentation_image');
            $table->text('description_ru');
            $table->text('description_en');
            $table->boolean('status')->default(0);
            $table->timestamps();

            $table->softDeletes();

            $table->index('sir_dog_id','dogs_sir_dog_idx');
            $table->foreign('sir_dog_id','dogs_sir_dog_fk')->on('dogs')->references('id');
            $table->index('dam_dog_id','dogs_dam_dog_idx');
            $table->foreign('dam_dog_id','dogs_dam_dog_fk')->on('dogs')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('litters');
    }
};
