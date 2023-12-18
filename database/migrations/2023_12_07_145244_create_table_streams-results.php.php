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
        Schema::create('streams-results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stream_id');
            $table->foreign('stream_id')->references('id')
                ->on('streams');
            $table->decimal("total_revenue_generated",20,2)->default(0);
            $table->boolean("is_stream_validated")->default(false);
            $table->boolean("is_streamer_payed")->default(false);
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('streams-results');
    }
};
