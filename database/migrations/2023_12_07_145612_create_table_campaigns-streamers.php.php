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
        Schema::create('campaigns-streamers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('streamer_id');
            $table->foreign('streamer_id')->references('id')
                ->on('streamers');
            $table->unsignedBigInteger('campaign_id');
            $table->foreign('campaign_id')->references('id')
                ->on('campaigns');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('campaigns-streamers');
    }
};
