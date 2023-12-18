<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Campaign extends Authenticatable
{

   protected $fillable = [


      'campaign_streamers_on_it',
      "campaign_name",
      "campaign_description",
      "campaign_start_date",
      "price_per_single_view",


   ];


   public function streamers(): BelongsToMany
   {
      return $this->belongsToMany(Stream::class, "streams", "streamer_id", "campaign_id");
   }

   public function country(): BelongsTo
   {
      return $this->belongsTo(Country::class, "country_id");
   }
}

