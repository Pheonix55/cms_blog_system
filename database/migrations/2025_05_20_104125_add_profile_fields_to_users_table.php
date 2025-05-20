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
        Schema::table('users', function (Blueprint $table) {
            $table->string('profile_image')->nullable();
            $table->string('cover_image')->nullable();
            $table->text('bio')->nullable();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('website')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('github')->nullable();
            $table->string('instagram')->nullable();
            $table->timestamp('last_login_at')->nullable();
            $table->string('status')->default('active');
            $table->date('birthday')->nullable();
            $table->integer('dark_mode')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

        });
    }
};
