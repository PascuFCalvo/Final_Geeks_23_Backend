<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Country extends Authenticatable
{

   protected $fillable = [];


  public function streams()
  {
     return $this->hasMany(Stream::class, "country_id");
  } 

   public function streamers()
   {
       return $this->hasMany(Streamer::class, "country_id");
   }

   public function campaigns()
   {
       return $this->hasMany(Campaign::class, "country_id");
   }

   public function users()
   {
       return $this->hasMany(User::class, "country_id");
   }
}

