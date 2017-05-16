<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_status extends Model
{
  protected $primaryKey='Status_ID';
  protected $table = 'order_status';
  protected $fillable = ['Status_ID', 'Stuatus'];
  public $timestamps = false;
}
