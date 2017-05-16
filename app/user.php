<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
  protected $primaryKey = 'User_ID';
	protected $table = 'user';
	protected $fillable = ['User_ID', 'Full_Name', 'Email', 'Job_Title', 'Hired_Date', 'Username', 'Password', 'Remember_Token', 'User_Type', 'Is_Active', 'Registered_Date', 'Registered_IP', 'Login_Count'];
	protected $hidden = ['Password','Remember_Token'];
	public $timestamps = false;
}
