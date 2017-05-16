<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\company;
use App\user;
use App\district;
use App\industry;

class ClientController extends Controller
{
    public function loadClientData(){
      $cdata = company::where("Company_ID",$_POST['cid'])->first();
      $user = user::where("User_ID",$cdata->User_ID)->first();
      $district = district::where("District_ID",$cdata->District_ID)->first();
      $industry = industry::where("Industry_ID",$cdata->Industry_ID)->first();
      $rdata = array(
        'cmp_name'=>$cdata->Company_Name,
        'cmp_addr'=>$cdata->Address ?: "N/A",
        'cmp_location'=>$cdata->CityTown ?: "N/A",
        'cmp_districtid'=>$cdata->District_ID,
        'cmp_district'=>$district->District_Name ?: "N/A",
        'cmp_industryid'=>$cdata->Industry_ID,
        'cmp_industry'=>$industry->Industry ?: "N/A",
        'cmp_contact'=>$cdata->Contact_No ?: "N/A",
        'cmp_fax'=>$cdata->Fax_No ?: "N/A",
        'cmp_email'=>$cdata->Email ?: "N/A",
        'cmp_website'=>$cdata->Website ?: "N/A",
        'cmp_contperson'=>$cdata->Contact_Person ?: "N/A",
        'cmp_cpcont'=>$cdata->CPerson_Phone ?: "N/A",
        'cmp_cpemail'=>$cdata->CPerson_Email ?: "N/A",
        'cmp_desc'=>$cdata->Description ?: "N/A",
        'cmp_regdate'=>date("M d, Y",strtotime($cdata->Register_Date)),
        'cmp_addedperson'=>$user->Full_Name,
      );
      return Response()->json(['data'=>$rdata]);
    }
}
