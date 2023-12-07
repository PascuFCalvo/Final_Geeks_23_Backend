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
        Schema::create('brands', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')
            ->on('users')->onDelete('cascade');
            $table->string('brand_CIF', 20);
            $table->string('brand_name', 50);
            $table->string('brand_description', 100);
            $table->string('brand_logo_link', 100);
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')
            ->on('countries');
            $table->boolean('has_active_campaigns')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brands');
    }
};
