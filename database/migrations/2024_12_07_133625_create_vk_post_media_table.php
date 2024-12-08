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
        Schema::create('vk_post_media', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vk_post_id');
            $table->unsignedBigInteger('media_type_id');
            $table->text('url');
            $table->timestamps();

            $table->index('vk_post_id','vk_post_media_vk_post_idx');
            $table->foreign('vk_post_id','vk_post_media_vk_post_fk')->on('vk_posts')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vk_post_media');
    }
};
