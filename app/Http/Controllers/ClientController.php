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

    public function newclient(Request $request){
      /*$msg=array(
        "cmp_name.required"=>"Company Name cannot be empty",
        "cmp_city.required"=>"City cannot be empty",
        "district_id.required"=>"Please select a District",
        "industry_id.required"=>"Please select a Industry",
        "cp_name.required"=>"Company name is Required",
        "cp_contact.required"=>"Check the Contact Number",
        "cp_email.required"=>"Invalid Email Format",
      );

      $this->validate($request,[
        'cmp_name'=>'required|max:150',
        'cmp_address'=>'required|max:200',
        'cmp_city'=>'required|max:30',
        'district_id'=>'required',
        'industry_id'=>'required',
        'cp_name'=>'required|max:150',
        'cp_contact'=>'numeric',
        'cp_email'=>'required|email|unique:company',
      ],$msg);*/

      $company=company::create(array(
        'Company_Name'=>addslashes($request['cmp_name']),
        'Address'=>addslashes($request['cmp_address']),
        'CityTown'=>addslashes($request['cmp_city']),
        'District_ID'=>addslashes($request['district_id']),
        'Country_ID'=>addslashes($request['country_id']),
        'Industry_ID'=>$request['industry_id']),
        'Contact_Person'=>addslashes($request['cp_name']),
        'CPerson_Phone'=>addslashes($request['cp_contact']),
        'CPerson_Email'=>addslashes($request['cp_email']),
        'User_ID'=>Session::get('AID'),
        'Register_Date'=>date("Y-m-d"),
      ));
      $company->save();
      echo "successfully saved!";
      /*return redirect::back()->with('status', 'Client added successfully');
      $request->session()->flush();*/
  }
}
