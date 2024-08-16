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
        Schema::create('trip_list', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('title')->nullable();
            $table->string('origin');
            $table->string('destination');
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('status', ['single day', 'multi-day'])->default('single day');
            $table->text('description')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->index('id');
            $table->index('user_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trip_list');
    }
};
