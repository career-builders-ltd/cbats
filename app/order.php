<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
  protected $primaryKey='Order_ID';
  protected $table = 'order';
  protected $fillable = ['Order_ID', 'User_ID', 'Company_ID', 'Order_Title', 'Date_Added', 'Required_Date', 'Salary', 'CityTown','OCState', 'Status', 'Priority', 'No_Of_Openings', 'Industry_ID', 'Skills', 'Keywords', 'Min_Experience_Year', 'Min_Experience_Month', 'Degree', 'Certification', 'Job_Description', 'CVSubmit', 'CVShortlist', 'CVInterview', 'Is_Active', 'Is_Delete'];
  public $timestamps = false;
}
