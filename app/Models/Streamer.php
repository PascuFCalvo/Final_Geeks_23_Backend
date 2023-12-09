<?php

namespace App\Models;

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
