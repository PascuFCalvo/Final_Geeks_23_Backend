<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Brand extends Authenticatable
{

   protected $fillable = [


      'user_id',
      'brand_name',
      'brand_cif',
      'brand_description',
      'brand_logo_link',
      'country_id',
      'has_active_campaigns',


   ];
}
