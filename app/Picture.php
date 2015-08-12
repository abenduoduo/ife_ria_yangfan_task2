<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    //
  protected  $table = 'pictures';
  //  $table = 'pictures';
  protected  $primaryKey = 'id';
  protected $fillable = ['title','dimension','tag','cat','usr'];
  
  protected $guarded = ['_token','_method'];
}

