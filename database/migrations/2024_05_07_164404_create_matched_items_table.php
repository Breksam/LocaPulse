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
        Schema::create('matched_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_found')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('user_missing')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('found_id')->references('id')->on('founds')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('lost_id')->references('id')->on('losts')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('isfound')->default(0);
            $table->boolean('ismatch')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matched_items');
    }
};
