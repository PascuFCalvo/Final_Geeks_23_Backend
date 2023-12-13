<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Campaign extends Authenticatable
{

   protected $fillable = [


      'campaign_streamers_on_it'


   ];

   protected $attributes = [
      'campaign_streamers_on_it' => 0,
   ];

   public function brand()
   {
      return $this->belongsTo(Brand::class);
   }
}
