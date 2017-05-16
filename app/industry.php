<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class industry extends Model
{
  protected $primaryKey='Industry_ID';
  protected $table = 'industry';
  protected $fillable = ['Industry_ID', 'Industry'];
  public $timestamps = false;
}
