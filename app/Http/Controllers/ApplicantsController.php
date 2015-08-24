<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Log;
use App\FederalPovertyLevel;
use App\HealthPlan;
use App\PremiumModifier;


use Illuminate\Http\Request;

class ApplicantsController extends Controller {

	/**
	* @todo   Might want to present something else to the user if the zipcode is not supported.
	*/
    
    public function index(Request $request)
    {
		$plan_id  = $request->input('plan_id');
	
		$premium_cost  = $request->input('premium_cost');
		$chip  = $request->input('chip');
		$county  = $request->input('county');
		$zip  = $request->input('zip');
		$fpl  = $request->input('fpl');
        $cookie_name = 	'applicant_cookie' ;
	
		$applicant_id = '';
				if(isset($_COOKIE[$cookie_name])) {
					 $result = DB::table('applicant')->where('cookie_hash',$_COOKIE[$cookie_name])->first();
					 if(!empty($result) &&  (!empty($plan_id) && $plan_id == 	$result->PlanIDstandardcomponent)){
						
							$step_id =	$result->step_id ;
							$applicant_id =	$result->id ;
							$healthCoverageYes = $result->healthCoverageYes ; 
						}else if(!empty($result) && (!empty($plan_id) && $plan_id !=	$result->PlanIDstandardcomponent) ){
							
							$step_id =	1 ;
							$applicant_id =	'' ;
							$healthCoverageYes = 1;
						}else if(!empty($result) && empty($plan_id)){
							
							$plan_id = $result->PlanIDstandardcomponent ;
							$step_id =	$result->step_id ;
							$applicant_id =	$result->id ;
							$healthCoverageYes = $result->healthCoverageYes ;
							
						}
				}else if(empty($plan_id)){
					$step_id =	1 ;
					$applicant_id =	'' ;
					$healthCoverageYes = 1;
					$plan_id = 0;
				}else{
					$step_id =	1 ;
					$applicant_id =	'' ;
					$healthCoverageYes = 1;
					
				} 
	
return view ('pages.applicants', ['applicant_id' => $applicant_id, 'fpl'=>$fpl , 'chip'=>$chip , 'zip'=>$zip , 'county'=>$county , 'premium_cost'=>$premium_cost , 'step_id'=>$step_id ,'health_coverage'=>$healthCoverageYes,'plan_id'=>$plan_id]);
    	
    }

	function saveForm(){
	
		return view ('pages.applicants', ['zip' => 'Its Zip', 'carrierArr'=>$carrierArr]);
	}
/*
* Function to save cookie
*/

function tosetCookie($c_val){
	$c_val_md5  = md5($c_val) ;
	setcookie('applicant_cookie',$c_val_md5, time() + (86400 * 30), "/"); // 86400 = 1 day
	
	
	
}
/*
* Function to save  form
*/


function submitApplicant(Request $request){
	return view ('pages.applicantssubmit', ['zipcode' => 2, 'plansArr'=>2 ,'totalplans' =>4] );
}	




/*
* Function to save  form
*/


function view(Request $request){
	

$items       	 = json_decode($_POST['info']);

if(isset($_POST['income'])){
$incomes = json_decode($_POST['income'], true);

}
	if(isset($_POST['coverage'])){
			$coverage = json_decode($_POST['coverage'], true);
	}


$step_id         = $_POST['step_id'];
//$applicant_id         = $_POST['applicant_id'];
if(isset($_POST['applicant_type_id'])){
$applicant_type_id         = $_POST['applicant_type_id'];

}
if(isset($_POST['applicant_id'])){
$applicant_id         = $_POST['applicant_id'];

}
if(isset($_POST['PlanIDstandardcomponent'])){
$PlanIDstandardcomponent         = $_POST['PlanIDstandardcomponent'];

}
if(isset($_POST['premium_cost'])){
$premium_cost         = $_POST['premium_cost'];

}
if(isset($_POST['zip'])){
$zip         = $_POST['zip'];

}
if(isset($_POST['county'])){
$county         = $_POST['county'];

}
// print_r($applicant_id);
// print_r($step_id);
// print_r($applicant_type_id);die;

$tempArr = array();
$tempArrCov = array();

$i =1 ;



	foreach($items as $key=>$val){
		
		foreach($val as $k=>$v){
			//if($k != 'applicant_id'){
				if($step_id == 2 or $step_id == 6 ){
					$tempArr[0][$k]= $v;
					$tempArr[0]['applicant_id']= $applicant_id;
					$tempArr[0]['applicant_type']= $applicant_type_id;
				}else{
					
					$tempArr[$k]= $v;
				}
			
		}
		$i++ ;
	}
	// echo '<pre>';
	// print_r($tempArr);die;
	
		if(isset($_POST['coverage'])){
			foreach($coverage as $kcov=>$vcov){

				foreach($vcov as $kc=>$vc){
					$tempArrCov[0][$kc]= $vc;
				}
	
			}
		}
		
if($step_id == 2 or $step_id == 6){
		
		//for saving information of applicant in applicant info
		$stepArr = array(
			'step_id' => $step_id   
			
			);
		$id = DB::table('applicant')->where('id',$applicant_id)->update($stepArr);//for update the step_ids
		foreach($tempArr as $tkey=>$tval){
			$result = DB::table('applicant_info')->where('applicant_id',$applicant_id)->where('applicant_type',$tval['applicant_type'])->first();
			
			if(empty($result)){
								
				$id =  DB::table('applicant_info')->insertGetId($tval);
			}else{
				$info_id	= $result->id ;
				$id = DB::table('applicant_info')->where('id',$info_id)->update($tval);
			}
			
		}
		
/* for saving the income informations */
	if(!empty($incomes)){
		foreach($incomes as $ikey=>$ival){
				$result = DB::table('applicant_income')->where('applicant_id',$applicant_id)->where('applicant_info_id',$applicant_type_id)->first();
			$ival['applicant_id'] = $applicant_id ;
				$ival['applicant_info_id'] = $applicant_type_id ;
			if(empty($result)){
								
				$id =  DB::table('applicant_income')->insertGetId($ival);
			}else{
				$id =  DB::table('applicant_income')->insertGetId($ival);
				// $income_id	= $result->id ;
				// $id = DB::table('applicant_income')->where('id',$income_id)->update($ival);
			}						

		}
	}
/* for saving health coverage infomation */ 		
	if(!empty($tempArrCov)){
			foreach($tempArrCov as $tkey=>$tcal){
			$result = DB::table('applicant_info')->where('applicant_id',$applicant_id)->where('applicant_type',$applicant_type_id)->first();
			
			$tcal['applicant_id']   = $applicant_id ;
			$tcal['applicant_type'] = $applicant_type_id ;
			if(empty($result)){								
				$id =  DB::table('applicant_info')->insertGetId($tcal);
			}else{
				$info_id	= $result->id ;
				$id = DB::table('applicant_info')->where('id',$info_id)->update($tcal);
			}
			
		}
	}	
		
		
}else{ 
			//for saving first form informations
			//$result = DB::table('applicant')->where('cookie_hash',1)->first();
			if(empty($applicant_id)){
				if($step_id == 1){
				$tempArr['step_id'] = $step_id + 1 ;
				}else{
					$tempArr['step_id'] = $step_id  ;
					
				}
				$tempArr['PlanIDstandardcomponent'] = $PlanIDstandardcomponent  ;
				$tempArr['premium_cost'] = $premium_cost  ;
				$tempArr['zip'] = $zip  ;
				$tempArr['county'] = $county  ;
				$id =  DB::table('applicant')->insertGetId($tempArr);
				
				$cookieid	=	$_SERVER['HTTP_USER_AGENT'].'_'.$id;
				$this->tosetCookie($cookieid);
				$tempArr1['cookie_hash'] = md5($cookieid);
				$id1 = DB::table('applicant')->where('id',$id)->update($tempArr1);
				$applicant_id    =  $id ;
			}else{
				//$id = $applicant_id;
				if($step_id == 1){
				$tempArr['step_id'] = $step_id + 1 ;
				}else{
					$tempArr['step_id'] = $step_id  ;
					
				}
				$id = DB::table('applicant')->where('id',$applicant_id)->update($tempArr);
				
			}
		
	}
	
			if($step_id == 1){
				
				$result = DB::table('applicant')->where('id',$applicant_id)->first();
			
				$jsonresult       = json_encode($result);
				
				 echo $jsonresult ;
			}else{
				$tempArr2['status'] = 1  ;
				$id = DB::table('applicant')->where('id',$applicant_id)->update($tempArr2);
				echo $applicant_id;	
				
			}
	



}
}
