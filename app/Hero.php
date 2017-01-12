<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    public function superpowers()
    {
      return $this->belongsToMany('App\Superpower');/*can have many superpowers*/
    }
    public function nemesis()
    {
      return $this->belongsTo('App\Hero', 'nemesis_id');/* one hero can have one enemy*/
    }
    public $timestamps = false;
}
