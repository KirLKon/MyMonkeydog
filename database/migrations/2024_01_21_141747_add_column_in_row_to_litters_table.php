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
        Schema::table('litters', function (Blueprint $table) {
            $table->unsignedBigInteger('in_row')->after('status')->default(3);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('litters', function (Blueprint $table) {
            $table->dropColumn('in_row');
        });
    }
};
