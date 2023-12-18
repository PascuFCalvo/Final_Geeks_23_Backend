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
        Schema::create('streams', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('streamer_id');
            $table->foreign('streamer_id')->references('id')
                ->on('streamers')->onDelete('cascade');
            $table->string('stream_title', 50);
            $table->string('stream_description', 100);
            $table->string('stream_date', 100);
            $table->integer('stream_ammount_of_viewers');
            $table->text('stream_check_picture_1');
            $table->text('stream_check_picture_2');
            $table->unsignedBigInteger('campaign_id');
            $table->foreign('campaign_id')->references('id')
                ->on('campaigns')->onDelete('cascade');
            $table->unsignedBigInteger("country_id");
            $table->foreign('country_id')->references('id')
                ->on('countries');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('streams');
    }
};
