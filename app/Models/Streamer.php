<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Streamer extends Authenticatable
{

   protected $fillable = [
      "user_id",
      "country_id",
      'streamer_nick',
      'streamer_nif',
      'streamer_platform',
      'image_stream',


   ];

   public function campaigns(): BelongsToMany
   {
      return $this->belongsToMany(Campaign::class, "streams", "streamer_id", "campaign_id");
   }

   public function user(): BelongsTo
   {
      return $this->belongsTo(User::class, "user_id");
   }

   public function country(): BelongsTo
   {
      return $this->belongsTo(Country::class, "country_id");
   }

   public function streams(): HasMany
   {
      return $this->hasMany(Stream::class, "streamer_id");
   }
}
