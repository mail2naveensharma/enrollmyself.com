<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
use Log;
use App\FederalPovertyLevel;
use App\HealthPlan;
use App\PremiumModifier;


use Illuminate\Http\Request;

class PlansController extends Controller {

    
    public function index(Request $request)
    {
		if(($request->input('json_zip'))){
			$countyzip = DB::table('zipcounty')->where('zipcode', '=', $request->input('json_zip'))->get();
			
			if(empty($countyzip)){
			$countyzip = DB::table('zipcodes')->where('zipcode', '=', $request->input('json_zip'))->get();
					return response()->json(array('result'=>$countyzip,'cnt'=>count($countyzip),'check'=>2));
			}else{
						return response()->json(array('result'=>$countyzip,'cnt'=>count($countyzip),'check'=>1));
			}
			
	
		 }
         $countyzip = DB::table('zipcounty')->where('zipcode', '=', $request->input('zip'))->first();
        
         
		/*      if(!$countyzip->$request) {
				return redirect(route('home'));
			}
		*/   

    	if(!$request->input('zip')) {
    		return redirect(route('home'));
    	}
       	$result = DB::table('zipcodes')->where('ZipCode', $request->input('zip'))->first();

       	/**
       	* @todo Might want to present something else to the user if the zipcode is not supported.
        */
    	if(!$result) {
			if(($request->input('county_code')))return response()->json(array('cnt'=>0));

    		Log::error('Failed to match zipcode: ' . $request->input('zip'));
    		return redirect(route('home'));
    	}
		if(($request->input('county'))){
			$result->County	=	$request->input('county');
		}
        // Check to see if we have at least ONE plan to offer here

		//$plan = HealthPlan::where('State', $result->StateCode)->where('County', $result->County)->where('PremiumAdultIndividualAge21', '!=', 0)->get();
		$plan = HealthPlan::where('State', $result->StateCode)->where('County', $result->County)->get();
		$plan = $plan->toArray();
// echo '<pre>';
// print_r($plan);die;
		$carrier = HealthPlan::	select('IssuerName')->where('State', $result->StateCode)->where('County', $result->County)->where('PremiumAdultIndividualAge21', '!=', 0)->groupBy('IssuerName')->get();
		$carrierArr = $carrier->toArray();
		if($request->input('page')){

			if($request->input('page') == 1)
			{
				$plan	=	array_slice($plan, -20);//remove remaining records
			}else
			{
				$record_per_page	=	20*$request->input('page')-20;//remove initial records
				$plan = array_slice($plan, $record_per_page); 
			}
		}
        if(!$plan) {
			if(($request->input('county_code')))return response()->json(array('cnt'=>0));
            Log::error('Failed to match a plan to zipcode: ' . $request->input('zip'));
            return redirect(route('home'));
        }

    	$request->session()->put('zip', $result);
		
		if(($request->input('county_code')))return response()->json(array('cnt'=>1));
				// return view ('pages.plans', ['zipcode' => $request->input('zip'), 'plansArr'=>$plan]);
				
				return view ('pages.plans', ['zipcode' => $request->input('zip'), 'carrierArr'=>$carrierArr]);
    	
    }

	public function view(Request $request)
	{				
				  	$data = $request->input('info');
					
					$ap		= $data['ap'];
					$state	= $data['state'];
					//$size	= $data['size'];
					$myage	= $data['age'];
					$fpl	= $data['fpl'];
					$Chip	= $data['Chip'];
					$page	= $data['page'];
					$Adult	= $data['Adult'];
					$credit	= $data['credit'];
					$county	= $data['county'];
					$metal	= $data['metal'];
					$network= $data['network'];
					$carrier= $data['carrier'];
					$zip	= $data['zipcode'];
					$sort	= $data['sort'];
					//print_r($credit);die;
					
					$family = $request->input('family', []);
					$family1 = $request->input('family1', []);
					// echo '<pre>';
					// print_r($family);die;
					foreach($family as $member) {
						if((int)$member['age']) {
							$members[] = $member;
						}
					}
					foreach($family1 as $member) {
						if((int)$member['age']) {
							$membersChild[] = $member;
						}
					}
						
				if(!$zip) {
					return redirect(route('home'));
				}
				$result = DB::table('zipcodes')->where('ZipCode', $zip)->first() ;

				/**
				* @todo Might want to present something else to the user if the zipcode is not supported.
				*/
				if(!$result) {
					if(($county))return response()->json(array('cnt'=>0));

					Log::error('Failed to match zipcode: ' . $zip);
					return redirect(route('home'));
				}
				if(($county)){
					$result->County	=	$county;
				}
				// Check to see if we have at least ONE plan to offer here
				$modifier = PremiumModifier::where('age', '<=', 100)->orderBy('age', 'asc')->get();
				$modifier = $modifier->toArray();
				$key = array_search($myage, array_column($modifier, 'age'));
				$modifier_value_self	 = $modifier[$key]['modifier'];	
				
				$metal_condition = $metal == 0?"'!='":"'='";
				$planq = HealthPlan::where('State', $result->StateCode)->where('County', $result->County);
				$planq->where('MetalLevel','!=', trim('Catastrophic'));
				$planq->where('MetalLevel','like', '%'.trim($metal).'%');
				$planq->where('PlanType','like', '%'.trim($network).'%');
				$planq->where('IssuerName','like', '%'.trim($carrier).'%');
				if($sort == 1 or $sort == '' ){$planq->orderBy('PremiumAdultIndividualAge21', 'ASC');}
				$plan = $planq->get();
				
				
				$plan = $plan->toArray();
				$planFloridaArr = array();
				$planTempArr = array();
				foreach($plan as $kplan=>$kval){
					if(($kval['IssuerName'] == 'Florida Blue HMO (a BlueCross BlueShield FL company)') or  ($kval['IssuerName'] == 'Florida Blue (BlueCross BlueShield FL)')){
							$planFloridaArr[] = $kval ; 
							array_splice($kval, $kplan, 1);
							//unset($kval[$kplan]);
						
					}else{
						$planTempArr[] = $kval ;
					}
						
				}
			/* 	echo '<pre>';
				echo '****************************************';
				print_r($planTempArr);
				echo '****************************************';
				print_r($plan); */
				$plan  = array_merge($planTempArr,$planFloridaArr);
				
			/* echo '****************************************';
				
				print_r($planFloridaArr);
				echo '****************************************';
				print_r($plan);die; */
				foreach($plan as $key=>$val){
				$total_child_pre = 0;
				$spouse_price = 0;
				$my_self_pre = 0;
				$var = 0;
				$creditvalue = 0 ;
				$total_premium = 0 ;
						if(!empty($myage)){//for add premium of myself 
						 $my_self_pre = $val['PremiumAdultIndividualAge21'] * $modifier_value_self  ;	
						}
						 if(!empty($members)){//for add premium of spouse 
							$sp_age = $members[0]['age'];
							$sp_modifier = PremiumModifier::calc($sp_age);
							$spouse_price = $val['PremiumAdultIndividualAge21'] * $sp_modifier  ;
							
						 } 
						 if($Chip >= $fpl){//for add premium of childs 
						 if(!empty($membersChild)){
							foreach($membersChild as $k=>$v){
								$childeAge = 	$v['age'];
								$ch_mod = PremiumModifier::calc($childeAge);
								$child_pri = $val['PremiumAdultIndividualAge21'] * $ch_mod  ;
								$total_child_pre = $total_child_pre + $child_pri ;
								
							}	 
						 }
						 }
						 $total_premium = $my_self_pre + $spouse_price + $total_child_pre ;
						 $plan[$key]['s_premium'] =  round($total_premium , 2 );
						
							$var   =  substr($credit,1);
							  $creditvalue = floatval(preg_replace('/[^\d.]/', '', $var));
							$plan[$key]['s_credit'] = number_format((float)$creditvalue, 2, '.', '');
						
/* //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */							 
						 if(!empty($fpl)){//for  94PercentActuarialValueSilverPlanCostSharing
							 if($fpl > 100 and 150 >= $fpl ){
								 $deductible = $val['94PercentActuarialValueSilverPlanCostSharing'];
								 
							 }elseif($fpl > 150 and 200 >= $fpl){
								 $deductible = $val['87PercentActuarialValueSilverPlanCostSharing'];
								
							 }elseif($fpl > 200 and 250 >= $fpl){
								$deductible = $val['73PercentActuarialValueSilverPlanCostSharing'];	
			
							 }else{
								$deductible = $val['StandardPlanCostSharing'];
			
							 }	
							//$val['deductible'] = $deductible ;
							 $plan[$key]['deductible'] = $deductible ;
						 }else{
							 $plan[$key]['deductible'] = $val['StandardPlanCostSharing'] ;
							
						 }	

/* //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */							 
							
							 if(empty($members) and empty($membersChild)){ //for check family or single
									 
									$maximumoutofPocket = 1;
							    	}else{
									$maximumoutofPocket = 2;	
									}	
							if(!empty($fpl)){ //for  9Mat Out Of Pocket
								if($fpl > 100 and 150 >= $fpl ){
								 	 if($maximumoutofPocket == 2){
								 $maxoutpocket = $val['MedicalMaximumOutofPocketfamily94percent'];
								 }else{
								 $maxoutpocket = $val['MedicalMaximumOutOfPocketindividual94percent'];
								 }	 	
								 
								
							 }elseif($fpl > 150 and 200 >= $fpl){
								 if($maximumoutofPocket == 2){
								 $maxoutpocket = $val['MedicalMaximumOutofPocketfamily87percent'];
								 }else{
								 $maxoutpocket = $val['MedicalMaximumOutOfPocketindividual87percent'];
								 }	
								
							 }elseif($fpl > 200 and 250 >= $fpl){
									 if($maximumoutofPocket == 2){
								 $maxoutpocket = $val['MedicalMaximumOutofPocketfamily73percent'];
								 }else{
								 $maxoutpocket = $val['MedicalMaximumOutOfPocketindividual73percent'];
								 }	
			
							 }else{
								 	 if($maximumoutofPocket == 2){
								 $maxoutpocket = $val['MedicalMaximumOutofPocketfamilystandard'];
								 }else{
								 $maxoutpocket = $val['MedicalMaximumOutOfPocketindividualstandard'];
								 }	
								 
								
			
							 }	
							 $plan[$key]['maxoutpocket'] = $maxoutpocket ;
							 
						 }else{
							$plan[$key]['maxoutpocket'] = $val['MedicalMaximumOutOfPocketindividualstandard'];
						 }		
/* //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */						
							if(!empty($fpl)){ //for  Specialist73percent
								if($fpl > 100 and 150 >= $fpl ){
								 	
								 $specilist = $val['Specialist94percent'];
								 } elseif($fpl > 150 and 200 >= $fpl){
									 $specilist = $val['Specialist87percent'];
								 }elseif($fpl > 200 and 250 >= $fpl){
									
								 $specilist = $val['Specialist73percent'];
								 }else{
								 	
								 $specilist = $val['Specialiststandard'];
								  }	
							 $plan[$key]['specilist'] = $specilist ;
							 
						 }else{
							$plan[$key]['specilist'] = $val['Specialiststandard'];
						 }	
/* //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */							 
						if(!empty($fpl)){ //for  9Mat Out Of Pocket
								if($fpl > 100 and 150 >= $fpl ){
								 	
								 $emergengy = $val['EmergencyRoom94percent'];
								 } elseif($fpl > 150 and 200 >= $fpl){
									 $emergengy = $val['EmergencyRoom87percent'];
								 }elseif($fpl > 200 and 250 >= $fpl){
									
								 $emergengy = $val['EmergencyRoom73percent'];
								 }else{
								 	
								 $emergengy = $val['EmergencyRoomstandard'];
								  }	
							 $plan[$key]['emergengy'] = $emergengy ;
							 
						 }else{
							$plan[$key]['emergengy'] = $val['EmergencyRoomstandard'];
						 }
						 
/* //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */	
						if(!empty($fpl)){ //for  SpecialtyDrugs94percent
								if($fpl > 100 and 150 >= $fpl ){
								 	
								 $specialDrug = $val['SpecialtyDrugs94percent'];
								 } elseif($fpl > 150 and 200 >= $fpl){
									 $specialDrug = $val['SpecialtyDrugs87percent'];
								 }elseif($fpl > 200 and 250 >= $fpl){
									
								 $specialDrug = $val['SpecialtyDrugs73percent'];
								 }else{
								 	
								 $specialDrug = $val['SpecialtyDrugsstandard'];
								  }	
							 $plan[$key]['specialDrug'] = $specialDrug ;
							 
						 }else{
							$plan[$key]['specialDrug'] = $val['SpecialtyDrugsstandard'];
						 }
						 
/* //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */						 
						 
						if(!empty($fpl)){ //for  PrimaryCarePhysician94percent
								if($fpl > 100 and 150 >= $fpl ){
								 	
								 $primarycare = $val['PrimaryCarePhysician94percent'];
								 } elseif($fpl > 150 and 200 >= $fpl){
									 $primarycare = $val['PrimaryCarePhysician87percent'];
								 }elseif($fpl > 200 and 250 >= $fpl){
									
								 $primarycare = $val['PrimaryCarePhysician73percent'];
								 }else{
								 	
								 $primarycare = $val['PrimaryCarePhysicianstandard'];
								  }	
							 $plan[$key]['primarycare'] = $primarycare ;
							 
						 }else{
							$plan[$key]['primarycare'] = $val['PrimaryCarePhysicianstandard'];
						 }	

/* //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */							 
							if(!empty($fpl)){ //for  InpatientFacility94percent
								if($fpl > 100 and 150 >= $fpl ){
								 	
								 $hospital = $val['InpatientFacility94percent'];
								 } elseif($fpl > 150 and 200 >= $fpl){
									 $hospital = $val['InpatientFacility87percent'];
								 }elseif($fpl > 200 and 250 >= $fpl){
									
								 $hospital = $val['InpatientFacility73percent'];
								 }else{
								 	
								 $hospital = $val['InpatientFacilitystandard'];
								  }	
							 $plan[$key]['hospital'] = $hospital ;
							 
						 }else{
							$plan[$key]['hospital'] = $val['InpatientFacilitystandard'];
						 }	
/* //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */	
								if(!empty($fpl)){ //for  GenericDrugs94percent
									if($fpl > 100 and 150 >= $fpl ){

										$generic = $val['GenericDrugs94percent'];
									} elseif($fpl > 150 and 200 >= $fpl){
										$generic = $val['GenericDrugs87percent'];
									}elseif($fpl > 200 and 250 >= $fpl){
										$generic = $val['GenericDrugs73percent'];
									}else{
										$generic = $val['GenericDrugsstandard'];
									}	
										$plan[$key]['generic'] = $generic ;

								}else{
									$plan[$key]['generic'] = $val['GenericDrugsstandard'];
								}	
/* //////////////////////////////////////////////////////////////////////////////////////////////////////////////////// */									
				}	
			$totalplans = 0;
			$ctr = count($plan);
			if($sort == 2){
				$tmpArr = $tmpPArr = array();$we=0;
				for($we = 0; $we < $ctr; $we++){ if($we == 2 or $we == 22 or $we == 12 or $we == 4 )  $plan[$we]['deductible'] = '';;
				if(($plan[$we]['deductible']) >0) {echo $tmpArr[$we]= "'".$plan[$we]['deductible']."'";}else{$tmpPArr[$we]= '';}}
				$tmpArr2 	= 	array_flip($tmpArr);ksort($tmpArr2);$tmpArr = $tmpArr2;
				$planNArr 	= 	array();
				foreach($tmpArr as $k=>$p){	$planNArr[] = $plan[$p];}
				foreach($tmpPArr as $k=>$p){	$planNArr[] = $plan[$k];}
				$plan		=	$planNArr;
			}
			if(count($plan) > 20){
			 
			$totalplans = 	ceil(count($plan)/20); 
			}
			
					if($page == 1)
					{
						$plan	=	array_slice($plan,0,20);//remove remaining records
						
					}else if($page > 1)
					{
						$record_per_page	=	20*$page-20;//remove initial records
						$plan = array_slice($plan, $record_per_page); 
					}else{
						
						$plan	=	array_slice($plan,0,20);
					}	
				
				if(!$plan) {
					if(($request->input('county_code')))return response()->json(array('cnt'=>0));
					Log::error('Failed to match a plan to zipcode: ' . $request->input('zip'));
					//return redirect(route('home'));
				}
					// echo '<pre>';
					// print_r($plan);die;
				$request->session()->put('zip', $result);
				if(($request->input('county_code')))
					
				return response()->json(array('cnt'=>1));
				return view ('pages.planlist', ['zipcode' => $request->input('zip'), 'plansArr'=>$plan ,'totalplans' =>$totalplans] );
		
			
		}
	
	
	
	
	
    public function calc(Request $request) {

		
    	// Make sure we have zipcode data.
    	if(!($zipcode = $request->session()->get('zip'))) {
    		return response()->json(['error' => 'Your session has expired. Please try again.']);
    	}
    	// $zipcode contains ZipCode, City, MixedCity, StateCode and County
    	$state = $zipcode->StateCode;
    	$county = $zipcode->County;


        //discover chip by state amount amount
        $chip = DB::table('bystatefpl') -> where ('state' , $state)->pluck('chip');
        
        //discover chip by adult 138
        $adult = DB::table('bystatefpl') -> where ('state' , $state)->pluck('adult');
        


    	// Get request data
    	$household = $request->input('household');
    	$myself = $request->input('myself');

    	$family = $request->input('family', []);

        // Check for valid data
        if(!$household['income'] || !$household['size']) {
            return response()->json(['error' => 'Invalid Income or Size Values']);
        }

        // Convert income to only number
        $household['income'] = (float)preg_replace("/[^0-9]/", "", $household['income']);
		
        if(!$myself['age']) {
            return response()->json(['error' => 'Invalid Age Specified For Myself']);
        }


    	$fpl = round(FederalPovertyLevel::calc($household['size'], $household['income']) * 100);

    	$members = [];
		
    	//if((int)$household['size'] >= 3 && $fpl < 250) {

    	//$fpl = FederalPovertyLevel::calc($household['size'], $household['income'] * 100);

    	//$members = [];

    	if((int)$household['size'] >= 2 && $fpl < $chip){

    		// Only add members who are ages > 18
    		foreach($family as $member) {
    			if((int)$member['age'] > 18) {
    				$members[] = $member;
    			}
    		}
    	} else {
    		foreach($family as $member) {
                if((int)$member['age']) {
    			 $members[] = $member;
                }
    		}
    	}
		if($fpl < $chip){
			$membersNotValid = [] ;
    		// Only add members who are ages > 18
    		foreach($family as $member) {
    			if((int)$member['age'] < 19) {
    				$membersNotValid[] = $member;
    			}
    		}
    	} else {
    		foreach($family as $member) {
                if((int)$member['age']) {
    			 $members[] = $member;
                }
    		}
    	}
		
        
        

    	$members[] = $myself;

        $premiumTotal = 0;
    	// Now calculate the monthly premiums for applicable members.

        // Get the second cheapest silver plan for this person.
        // Note, we get the cheapest plan, based on individual age of 21.  Then use the premium modifier.
        $plan = HealthPlan::where('State', $state)->where('County', $county)->where('MetalLevel', 'Silver')->where('PremiumAdultIndividualAge21', '!=', 0)->orderBy('PremiumAdultIndividualAge21', 'asc')->skip(1)->first();

        if(!$plan) {
            $response = ['error' => 'No plans available for that location'];
            return response()->json($response);
        }

        foreach($members as &$member) {
            $member['modifier'] = PremiumModifier::calc($member['age']);

            $member['premium'] = round($member['modifier'] * $plan->PremiumAdultIndividualAge21, 2);

            // $member['premium'] = round($member['modifier'] * $plan->PremiumAdultIndividualAge21, 3);

            $premiumTotal = $premiumTotal + $member['premium'];
        }
// echo '<pre>';
		// print_r($premiumTotal);die;

        // Now calculate the Applicable Percentage
        if($fpl < 133) {
            $applicablePercentage = 2;
        } else if($fpl < 150) {

            $applicablePercentage = round( ((($fpl - 133) / (150-133)) * (4 - 3)) + 3 , 2 );
        } else if($fpl < 200) {
            $applicablePercentage = round( ((($fpl - 150) / (200-150)) * (6.3 - 4)) + 4 , 2 );
        } else if($fpl < 250) {
            $applicablePercentage = round( ((($fpl - 200) / (250-200)) * (8.05 - 6.3)) + 6.3 , 2 );
        } else if($fpl < 300) {
            $applicablePercentage = round( ((($fpl - 250) / (300-250)) * (9.5 - 8.05)) + 8.05 , 2 );

         
        } else if($fpl < 400) {
            $applicablePercentage = 9.5;
        } else {
            $applicablePercentage = 0; 
        }


        $credit = round($premiumTotal - ( ($household['income'] * ($applicablePercentage / 100)) / 12) , 0);


        if($fpl > 400 || $fpl < 100 || $credit < 0) {

        // if($fpl > 400 || $fpl < $adult || $credit < 0) {

            $credit = 0;
        }

        // Get the plans

    	     // Get the plans
		if(!empty($membersNotValid)){
			$response = [
    		'state' => $state,
    		'county' => $county,
            'ap' => $applicablePercentage,
            'fpl' => $fpl,
			'membersNotValid' => $membersNotValid,
            'Chip' => $chip,
            'Adult' => $adult,
            'credit' => $credit
    	];
			
			
		}else{
				$response = [
    		'state' => $state,
    		'county' => $county,
            'ap' => $applicablePercentage,
            'fpl' => $fpl,
			'Chip' => $chip,
            'Adult' => $adult,
            'credit' => $credit
    	];
			
			
		}

    	return response()->json($response);
   // }
}
}
