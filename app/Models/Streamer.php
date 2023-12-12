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

 
}
