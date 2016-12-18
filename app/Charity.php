<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charity extends Model
{
    //

    	protected $table = 'charitys';

      /* Relationship Methods */

      /**
      * Members for the Charity
      */
      public function members()
      {
          return $this->hasMany('App\Member');
      }

      /**
      * Get Features for the Charity
      */
      public function features()
      {
          return $this->hasMany('App\Feature');
      }

      /**
      * owner for the Charity
      */
      public function user() {
          return $this->belongsTo('App\User');
      }
      /* End Relationship Methods */
}
