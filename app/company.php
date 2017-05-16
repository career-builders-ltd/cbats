<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    protected $primaryKey='Company_ID';
    protected $table = 'company';
    protected $fillable = ['Company_ID', 'Company_Name', 'Address', 'CityTown', 'District_ID', 'Country_ID', 'Industry_ID', 'Contact_No', 'Fax_No', 'Email', 'Website', 'Contact_Person', 'CPerson_Phone', 'CPerson_Email', 'Logo_Path', 'Logo_Name', 'Description', 'User_ID', 'Register_Date', 'Is_Active', 'Is_Delete'];
    public $timestamps = false;
}
