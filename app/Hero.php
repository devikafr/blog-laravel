<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    public function superpowers()
    {
      return $this->belongsToMany('App\Superpower');
    }
    public $timestamps = false;
}
