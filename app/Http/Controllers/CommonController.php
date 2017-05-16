<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Validator;
use Session;
use Redirect;
use App\user;
use App\city;
use App\district;
use App\order;
use App\company;
use App\order_status;
use DB;

class CommonController extends Controller
{
	public function index(){
		if(Session::get('AID')!='' && Session::get('ISA')==1){
				return redirect('dashboard');
		}
		return view("index");
	}

	public function dashboard(){
		return view("dashboard");
	}

	public function jobs(){
		$user_id = Session::get('AID');
		$orderQry = "SELECT `order`.*,`company`.`Company_Name` FROM `order`,`company` WHERE `order`.`Company_ID` = `company`.`Company_ID` AND `order`.`User_ID`='".$user_id."' ORDER BY `order`.`Date_Added` DESC";
		$data = array(
			'order_status'=>order_status::all(),
			'order'=>DB::select($orderQry),
		);
		return view("jobs")->with(['data'=>$data]);
	}

	public function candidates(){
		return view("candidates");
	}

	public function clients(){
		$data['clist'] = company::where('Is_Delete','0')->orderBy("Register_Date","DESC")->get();
		return view('clients')->with(['data'=>$data]);
	}

	//public function

	public function register(Request $data){
		/*$rules = [
			'fullname'=>'required|max:255',
			'address'=>'required|max:255',
			'email'=>'required|email|max:255|unique:user',
			'city'=>'required|max:100',
			'country'=>'required|max:100',
			'username'=>'required|max:100|unique:user',
			'password'=>'required|min:6|confirmed',
			'rpassword'=>'required|min:6|same:password',
		];

		$validator = Validator::make(Input::all(), $rules);
		if ($validator->fails()) {
			$messages = $validator->messages();
			print_r($messages);
			return Redirect::back()->withErrors($validator);
		}

		$admin_user = admin_user::create(array(
			'First_Name'=>$request['firstname'],
			'Last_Name'=>$request['lastname'],
			'Email'=>$request['email'],
			'Password'=>sha1($request['admin_pwd']),
			'Remember_Token'=>'',
			'Login_Count'=>0,
			'Register_Date'=>date("Y-m-d"),
			'Register_IP'=>Request()->IP(),
		));
		if($admin_user->save()){
			$data=array(
				'newuser'=>1,
				'success'=>1
			);
			return redirect("/admin/add-tour")->with(['data'=>$data]);
		}*/
	}

	function logout(){
		Session::flush();
		Session::regenerate();
		return redirect("/")->withCookie("cbatsdata","",-1);
	}


	public function login(Request $request){
		$this->validate($request,[
			'username'=>'required',
			'password'=>'required'
		]);

		$pwd = sha1($request['password']);
		$data = user::where('username',$request['username'])->where('Is_Active',1)->get();
		$remember = $request->has('remember');

		if(!count($data)){
			return Redirect::back()->withErrors(['unpwErr'=>['we couldn\'t find an account with that username. Can we help you recover your username?']])->withInput();
		}else{
			$adminrec='';
			foreach($data as $user){
				if($user['Password']==$pwd){
					$adminrec = $user;
					break;
				}
			}
			if($adminrec!=''){
				$admindata = array (
					'AID'=>$adminrec->User_ID,
					'AFN'=>$adminrec->Full_Name,
					'AUN'=>$adminrec->Username,
					'AEM'=>$adminrec->Email,
					'AUT'=>$adminrec->User_Type,
					'ISA'=>1
				);
				Session::put($admindata);
				$remtoken='';
				if($remember){
					$remtoken = "cbats_".$admindata['AID']."!".$admindata['AEM'].date("YmdHis");
					$remtoken = sha1($remtoken);
				}
				$udata = array(
					'Remember_Token'=>$remtoken,
					'Login_Count'=>($adminrec->Login_Count)+1,
				);
				user::find($adminrec->User_ID)->update($udata);
				$cookie = array (
					'AID'=>$adminrec->User_ID,
					'AEM'=>$adminrec->Email,
					'ART'=>$remtoken
				);
				if($remember==''){
					return redirect('dashboard');
				}else{
					return redirect("dashboard")->withCookie("cbatsdata",$cookie,60*24*10);
				}
			}else{
				return Redirect::back()->withErrors(['unpwErr'=>['that password isn\'t right. We can help you recover your password.']]);
			}
		}
	}
}
