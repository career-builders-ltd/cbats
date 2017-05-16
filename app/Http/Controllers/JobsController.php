<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\order;
use App\order_status;
use App\city;
use App\district;
use App\user;
use App\company;
use App\industry;
use Redirect;

class JobsController extends Controller
{
    public function loadJob(Request $req){
      $order = order::where("Order_ID",$req->jobid)->first();
      $company = company::where("Company_ID",$order->Company_ID)->first();
      $user = user::where('User_ID',$order->User_ID)->first();
      $industry = industry::where('Industry_ID',$order->Industry_ID)->first();
      $order_status = order_status::where('Status_ID',$order->Status)->first();

      $ov_astatus = $order->OCState == 1 ? 'Open' : 'Closed';
      $priority = 'Cold';
      if($order->Priority==1){
        $priority = 'Hot';
      }else if($order->Priority==2){
        $priority = 'Warm';
      }
      $degree = (trim($order->Degree)=="" || trim($order->Degree)==null) ? "N/A" : $order->Degree;
      $certificate = (trim($order->Certification)=="" || trim($order->Certification)==null) ? "N/A" : $order->Certification;

      $exp = $order->Min_Experience_Year > 0 ? $order->Min_Experience_Year." year(s) " : '';
      $exp.= $order->Min_Experience_Month > 0 ? $order->Min_Experience_Month." month(s) " : '';

      $status_arr = [];
      foreach(order_status::all() as $orstat){
        $status_arr[]=  $orstat->Status;
      }

      $stset = [
        'order_status' => $status_arr,
        'status'=>$order->Status,
      ];

      $resp = array (
          'ov_title'=>($req->jobid < 10 ? '0'.$req->jobid : $req->jobid)." : ".$order->Order_Title,
          'ov_company'=>$company->Company_Name,
          'status_view'=>$order->Status,
          'ov_addDate'=>date("M d, Y",strtotime($order->Date_Added)),
          'ov_schDate'=>date("M d, Y",strtotime($order->Required_Date)),
          'ov_client'=>$company->Company_Name,
          'ov_CPName'=>$company->Contact_Person,
          'ov_CPPhone'=>$company->CPerson_Phone,
          'ov_astatus'=>$ov_astatus,
          'ov_status'=>$order_status->Status,
          'ov_priority'=>$priority,
          'ov_userName'=>$user->Full_Name,
          'ov_salary'=>"Rs. ".number_format($order->Salary,2,'.',','),
          'ov_location'=>$order->CityTown,
          'ov_numOpen'=>$order->No_Of_Openings,
          'ov_industry'=>$industry->Industry,
          'ov_skills'=>$order->Skills,
          'ov_keywords'=>$order->Keywords,
          'ov_minexp'=>$exp,
          'ov_reqDeg'=>$degree,
          'ov_reqCert'=>$certificate,
          'ov_jdesc'=>$order->Job_Description,
          'ov_shortlist'=>$order->CVShortlist,
          'ov_submit'=>$order->CVSubmit,
          'ov_interview'=>$order->CVInterview,
          'ov_jobid'=>$order->Order_ID,
      );
      return response()->json(['data'=>$resp,'stdset'=>$stset]);
    }
}
