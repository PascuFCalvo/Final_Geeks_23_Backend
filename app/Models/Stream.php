<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Stream extends Authenticatable
{

   protected $fillable = [


      "streamer_id",
      "stream_title",
      "stream_description",
      "stream_date",
      "stream_ammount_of_viewers",
      "stream_check_picture_1",
      "stream_check_picture_2",
      "stream_total_to_receive",
      "campaign_id",
      "country_id",
      "is_stream_payed",


   ];

   public function streamer()
   {
      return $this->belongsTo(Streamer::class);
   }

   public function campaign()
   {
      return $this->belongsTo(Campaign::class);
   }
}