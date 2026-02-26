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
       Schema::create('priests', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('title')->nullable();
            $table->text('bio')->nullable();
            $table->text('short_bio')->nullable();
            $table->string('image')->nullable();

            $table->string('youtube_channel_id')->nullable();
            $table->string('youtube_channel_name')->nullable();
            $table->unsignedBigInteger('youtube_subscribers')->default(0);

            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('location')->nullable();

            $table->string('facebook_url')->nullable();
            $table->string('instagram_url')->nullable();
            $table->string('youtube_url')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('priests');
    }
};
