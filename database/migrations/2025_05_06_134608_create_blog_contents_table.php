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
        // Schema::create('blog_contents', function (Blueprint $table) {
        //     $table->id();
        //     $table->timestamps();
        // });
        Schema::create('blog_contents', function (Blueprint $table) {
            $table->id();
            $table->integer('blog_id');
            $table->string('type'); // 'text', 'image', 'video', 'code', etc.
            $table->longText('content'); // For text content or image paths
            $table->string('image_caption')->nullable();
            $table->string('image_alt')->nullable();
            $table->unsignedInteger('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blog_contents');
    }
};
