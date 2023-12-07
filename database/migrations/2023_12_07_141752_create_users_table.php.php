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
        Schema::create('users', function (Blueprint $table){
            $table->id();
            $table->string('user_name', 50);
            $table->string('user_email', 100)->unique();
            $table->string('password', 12);
            $table->string('user_phone', 20);
            $table->enum("user_role", ["admin", "streamer", "brand"])->default("streamer");
            $table->boolean('is_active')->default(true);
            $table->text('user_avatar_link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
