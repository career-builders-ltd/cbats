<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\district;

class city extends Model
{
  protected $primaryKey='City_ID';
  protected $table = 'city';
  protected $fillable = ['City_ID', 'City_Name', 'District_ID'];
  public $timestamps = false;

  public function district(){
      return $this->hasOne("App\district","District_ID","District_ID");
  }  
}
