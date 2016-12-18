<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    //
    protected $table = 'features';

    /* Relationship Methods */
    /**
    *
    */
    public function charitys()
    {
        return $this->belongsTo('App\Charity');
    }
    /* End Relationship Methods */
}
