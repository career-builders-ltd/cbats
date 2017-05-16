<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\city;

class district extends Model
{
  protected $primaryKey='District_ID';
  protected $table = 'district';
  protected $fillable = ['District_Name', 'Lat', 'Lng', 'Country_ID'];
  public $timestamps = false;

  public function city(){
    return $this->belongsTo('App\city',"District_ID","District_ID");
  }
}
