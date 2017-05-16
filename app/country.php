<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class country extends Model
{
  protected $primaryKey='Country_ID';
  protected $table = 'country';
  protected $fillable = ['Country_ID', 'Country_Name'];
  public $timestamps = false;
}
