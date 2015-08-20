function showlist(id){
	
var myage	= $('#myself-age').val();
if(myage == ''){
	alert('Please Enter Details');
}	
	reloadjson();
	setTimeout(showlistexec(id), 4000);
	
}
/*
 * Show income type div w.r.t id ,
 * 
 */	
function showamtoption(id){
	var result = 	id.split("-"); 
  var 	type_id	 =	result[1] ;
	$('#incometypediv-'+type_id).show();
	$('#incometype-'+type_id).removeAttr('disabled');
	
	//$('.hideOnApplyingCoverageNo').attr('disabled','disabled').hide('slow');
}	
/*
 * Show income job type div w.r.t id ,
 * 
 */	
function selectjobtype(id){
  var result = 	id.split("-"); 
  var 	type_id	 =	result[1] ;
	if($('#'+id).val() == 'job'){

		$('#employandssn-'+type_id).show();
		$('#employer_name-'+type_id).removeAttr('disabled');
		$('#employer_phone_number-'+type_id).removeAttr('disabled');
		
		$('#other_income_type-'+type_id).attr('disabled','disabled').hide();
	}else if($('#'+id).val() == 'other'){
		$('#employandssn-'+type_id).hide();
		$('#employer_name-'+type_id).attr('disabled','disabled');
		$('#employer_phone_number-'+type_id).attr('disabled','disabled');
		$('#other_income_type-'+type_id).removeAttr('disabled').show();
		
		
	}else{
		$('#employandssn-'+type_id).hide();
		$('#employer_name-'+type_id).attr('disabled','disabled');
		$('#employer_phone_number-'+type_id).attr('disabled','disabled');
		$('#other_income_type-'+type_id).attr('disabled','disabled').hide();
	}
		
	//$('.hideOnApplyingCoverageNo').attr('disabled','disabled').hide('slow');
}	
/* $("input").blur(function(){
    alert("This input field has lost its focus.");
}); */

function reloadjson(){
	var data = {};
    var data1 = {};
	data1.family = [];
	data1.family1 = [];
    data._token = $('#_token').val();
    data1._token = $('#_token').val();
    data.myself = {
      age: $('#myself-age').val(),
      tabacco: $('#myself-tabacco').is(":checked")
    };
    data.household = {
      income: $('#income-annual').val(),
      size: $('#income-household').val()
    };
    data.family = [];
    $('#family-members .family-member').each(function() {
      if($(this).find('.age').val() == '') {
      return true;
      }
      data.family[data.family.length] = {
        age: $(this).find('.age').val(),
        gender: $(this).find('.gender').val(),
        tabacco: $(this).find('.tabacco').is(':checked')
      };
    });
    $.post('/plans/calc', data, function(result) {
      if(typeof result.credit != "Undefined") {
        $('#credit-result').text(accounting.formatMoney(result.credit, '$', 0));
        $('#credit_value').val(accounting.formatMoney(result.credit, '$', 0));
        $('#fpl').val(result.fpl);
        $('#Chip').val(result.chip);
        $('#Adult').val(result.adult);
        $('#county').val(result.county);
        $('#state').val(result.state);
			//$("#show_plan").hide();	
		
		
			
      } else {
        $('#credit-result').text('Fill Out Your Information To Find Out!');
      }

    }, "json");
}	



/* function to show div w.r.t data */
function showlistexec(id){
	//console.log('showlistexec');
	if(id != 2000){
		var page_num = id ;
		
	}else{
id = 1;
	}	
	//reloadjson();
 var data = {};
    var data1 = {};
	 data._token = $('#_token').val();
    data1._token = $('#_token').val();
	data1.family = [];
	data1.family1 = [];
$('#family-members .spouse-member').each(function() {
				if($(this).find('.age').val() == '') {
					return true;
				}
				data1.family[data1.family.length] = {
					age: $(this).find('.age').val(),
					gender: $(this).find('.gender').val(),
					tabacco: $(this).find('.tabacco').is(':checked')
				};
			});
			$('#family-members .child_member').each(function() {
				if($(this).find('.age').val() == '') {
					return true;
				}
				data1.family1[data1.family1.length] = {
					age: $(this).find('.age').val(),
					gender: $(this).find('.gender').val(),
					tabacco: $(this).find('.tabacco').is(':checked')
				};
			});
		data1.info = {
			  ap: $('#ap').val(),
			  zipcode: $('#myself-zipcode').val(),
			  state:$('#state').val(),
			  page : id,
			
			  age: $('#myself-age').val(),
			  tabacco: $('#myself-tabacco').is(":checked"),
			  income: $('#income-annual').val(),
			  //size: $('#size-household').val(),
			  fpl: $('#fpl').val(),
			  Chip: $('#Chip').val(),
			  Adult: $('#Adult').val(),
			  credit: $('#credit_value').val(),
			  metal: $('#metal').val(),
			  carrier: $('#carrier').val(),
			  network: $('#network').val(),
			  county: $('#county').val(),
			  sort: $('#menu1').val()
			};
		
				$.post('/plans/view', data1, function(result) {
						
					//alert(result);
						$("#show_plan").show();
						$( "#show_plan" ).html(result);

					}
					);
}	

/*
function to show and hide mailing address
*/
function openmailingaddress(RadioVal){
		if(RadioVal == 1){
			$( '#show_mailingaddresss' ).hide( 'slow', function() {
				// Animation complete.
			});
		}else{
			$( '#show_mailingaddresss' ).show( 'slow', function() {
				// Animation complete.
			});
		}
			
		// // var addresscheck	=	$('#mailingaddresssame').val();
		// // alert(addresscheck);
		// // if(addresscheck == 0){
		// // $("#show_mailingaddresss").show();

		// // }else{
		// // $("#show_mailingaddresss").hide();
		// // }

}
/*
function to show next div
*/
function showApplicantinfodiv(){
		$("#showApplicantinfodiv").show();
		$("#info").hide();
}

/*
 * Function to display applicant relative if applying for their health coverage
 */
function applyingForRelative(confirmation){
	if(confirmation == 1){
			$( '#applyingForRelatveContainer' ).show( 'slow', function() {
				// Animation complete.
			});
		}else{
			$( '#applyingForRelatveContainer' ).hide( 'slow', function() {
				// Animation complete.
			});
		}
}

function differentSSname(ssNameConfirmation){
	if(ssNameConfirmation == 1){
			$( '#differentSocialSecurityName' ).hide( 'slow', function() {
				// Animation complete.
			});
		}else{
			$( '#differentSocialSecurityName' ).show( 'slow', function() {
				// Animation complete.
			});		
		}
}

function CheckUSCitizenship(CitizenshipConfirmation){
	if(CitizenshipConfirmation == 1){
			$( '#ImmigrationEligibleStatus' ).hide( 'slow', function() {
				// Animation complete.
			});
		}else{
			$( '#ImmigrationEligibleStatus' ).show( 'slow', function() {
				// Animation complete.
			});		
		}
}

function CheckSEVISone(SEVISstatus){
	if(SEVISstatus == 1){
			$( '#SEVISoneYes' ).show( 'slow', function() {
				// Animation complete.
			});
			$( '#SEVISoneNo' ).hide( 'slow', function() {
				// Animation complete.
			});
		}else{
			$( '#SEVISoneNo' ).show( 'slow', function() {
				// Animation complete.
			});
			$( '#SEVISoneYes' ).hide( 'slow', function() {
				// Animation complete.
			});	
		}
}

function otherDocsTypes(ODTstatus){
	if(ODTstatus == 1){
			$( '#otherDocsTypes' ).hide( 'slow', function() {
				// Animation complete.
			});	
		}else{
			$( '#otherDocsTypes' ).show( 'slow', function() {
				// Animation complete.
			});
		}
}


/*
 * This question appears when Yes is selected for filing tax return.
 */
function ftrValue(ftrValue){
	if(ftrValue == 1){
			$( '#isMarriedDiv' ).show( 'slow', function() {
				// Animation complete.
			});	
		}else{
			$( '#isMarriedDiv' ).hide( 'slow', function() {
				// Animation complete.
			});
		}
}


/*
 * This question appears when Yes is selected for filing tax return,
 * and Yes to being married
 */	
function isMarriedValue(IMValue){
	
	var fileTaxReturnChecked = $("#fileTaxReturnYes").is(':checked');
	
	if(IMValue == 1 && fileTaxReturnChecked){
			$( '#fileJointTaxReturnDiv' ).show( 'slow', function() {
				// Animation complete.
			});	
		}else{
			$( '#fileJointTaxReturnDiv' ).hide( 'slow', function() {
				// Animation complete.
			});
		}
}


/*
 * This will make #willClaimSeparateDependentsDiv appear
 * when Yes is selected for filing tax return,
 * and No to being married
 */	
function isMarriedValueUnmarried(IMValue){
		
	var fileTaxReturnUnmarriedChecked = $("#fileTaxReturnYes0Unmarried").is(':checked');
	
	if(IMValue == 0 && fileTaxReturnUnmarriedChecked){
			$( '#willClaimSeparateDependentsDiv' ).show( 'slow', function() {
				// Animation complete.
			});	
		}else{
			$( '#willClaimSeparateDependentsDiv' ).hide( 'slow', function() {
				// Animation complete.
			});
		}
}


/*
 * This will make #PAdependentsNameUnmarried appear and 
 * hide the #willBeClaimedAsDependentDiv1 when Yes is selected for filing tax return,
 * and No to being married, and Yes for Claiming Dependents.
 * IF Yes is selected for filing tax return,
 * No to being married and No for Claiming Dependents,
 * #PAdependentsNameUnmarried will be hidden and 
 * #willBeClaimedAsDependentDiv1 will be shown.
 */	
function showEitherOneOfBelow(DependentValue){
	
	var fileTaxReturnUnmarriedChecked = $("#fileTaxReturnYes0Unmarried").is(':checked'); // yes

	var isMarriedNo0UnmarriedChecked = $("#isMarriedNo0Unmarried").is(':checked'); // no
	
	if(DependentValue == 1 && fileTaxReturnUnmarriedChecked && isMarriedNo0UnmarriedChecked){
			$( '#PAdependentsNameUnmarried' ).show( 'slow', function() {
				// Animation complete.
			});
			$( '#willBeClaimedAsDependentDiv1' ).hide( 'slow', function() {
				// Animation complete.
			});	
	}else if(DependentValue == 0 && fileTaxReturnUnmarriedChecked && isMarriedNo0UnmarriedChecked){
			$( '#PAdependentsNameUnmarried' ).hide( 'slow', function() {
				// Animation complete.
			});
			$( '#willBeClaimedAsDependentDiv1' ).show( 'slow', function() {
				// Animation complete.
			});
	}
}

/*
 *	This question appears when Yes is selected for filing tax return,
 *  and Yes to being married, and Yes to filing jointly with spouse.
 */	
function fileJointTaxReturnValue(fjtValue){

	var fileTaxReturnChecked = $("#fileTaxReturnYes").is(':checked');

	var fileJointTaxReturnChecked = $("#fileJointTaxReturnYes").is(':checked');

	if(fjtValue == 1 && fileTaxReturnChecked && fileJointTaxReturnChecked){
			$( '#taxStatusSpouse' ).show( 'slow', function() {
				// Animation complete.
			});	
		}else{
			$( '#taxStatusSpouse' ).hide( 'slow', function() {
				// Animation complete.
			});
		}
}



/*
 * This will make #fileJointTaxReturnMarriedDiv appear
 * when Yes is selected for filing tax return - fileTaxReturnYes0Married and make #liveWithSpouseDiv appear
 * when No is selected for filing tax return - fileTaxReturnYes0Married
 */	
function fileJointTaxReturnMarriedDiv(fjtValue){
	
	if(fjtValue == 1){
			$( '#fileJointTaxReturnMarriedDiv' ).show( 'slow', function() {
				// Animation complete.
			});
			$( '#liveWithSpouseDiv' ).hide( 'slow', function() {
				// Animation complete.
			});
	}else{
		$( '#fileJointTaxReturnMarriedDiv' ).hide( 'slow', function() {
			// Animation complete.
		});
		$( '#liveWithSpouseDiv' ).show( 'slow', function() {
			// Animation complete.
		});
	}
}


function toggleImmigrationDocs(id){

	var immigrationStatus = $("#"+id).is(':checked');
			var s_idArray 	 =	id.split("-");
	var id			 =	s_idArray[1];
	if(immigrationStatus){
		$( "#immigrationDocs-"+id ).hide( "slow", function() {
		// Animation complete.
		});
		$( "#fieldAsperDocType-"+id ).hide( "slow", function() {
		// Animation complete.
		});
	}else{
		$( "#immigrationDocs-"+id ).show( "slow", function() {
		// Animation complete.
		});
		$( "#fieldAsperDocType-"+id ).show( "slow", function() {
		// Animation complete.
		});
	}	
}

function togglemarried(id){
			var immigrationStatus = $("#"+id).is(':checked');
			var s_idArray 	 =	id.split("-");
	var id			 =	s_idArray[1];

		
	if(immigrationStatus){
		$( "#single_tax_filing_status-"+id ).attr('disabled','disabled').hide();
		$( "#married_tax_filing_status-"+id ).removeAttr('disabled').show();
	}else{
		$( "#single_tax_filing_status-"+id ).removeAttr('disabled').show();
		$( "#married_tax_filing_status-"+id ).attr('disabled','disabled').hide();
	}	
}
// /*
 // * Function to clone applicant relative
 // */
// function cloneApplicant(){
	// $( "#second-applicant-clone" ).clone().appendTo( "#applyingForRelatveContainer" );
// }

/*
 * Function to clone applicant relative
 */
var cloneCount = 1;
function cloneApplicant(){

	 var mainDiv = $('#second-applicant-clone')
          .clone()
          .attr('id', 'second-applicant-clone'+ cloneCount++)
          .insertAfter($('[id^=second-applicant-clone]:last'));

}

/*
 * Function to clone Income Row
 */
function cloneBaseIncomeRow(id){
			var s_idArray 	 =	id.split("-");
			var id			 =	s_idArray[1];


		var timeNow = $.now();
	 // var mainTr = $('#baseIncomeRow')
          // .clone()
          // .attr('id', 'baseIncomeRow'+ cloneCount++)
          // .insertAfter($('[id^=baseIncomeRow]:last'));
	// //alert('baseIncomeRow'+cloneCount);
	// $('#baseIncomeRow'+cloneCount).css('display', 'inline');

	var cloneRow = '<tr id="baseIncomeRow-'+timeNow+'" class = "income"><td><span class="table-headers">$ </span><input type="text" value="" id="amount-'+timeNow+'" name="amount" onblur = "showamtoption(this.id);"></td><td><div id = "incometypediv-'+timeNow+'" style = "display:none" ><select name="income_type" id = "incometype-'+timeNow+'" onchange = "selectjobtype(this.id);" disabled ><option selected="" value="no_income">Select Source</option><option value="job">Job</option><option value="self_employed">Self Employed</option><option value="social_security">Social Security Benefits</option><option value="retirement">Retirement Benefits</option><option value="unemployment_benefits">Unemployment Benefits</option><option value="farming_fishing">Farming &amp; Fishing</option><option value="capital_gains">Capital Gains</option><option value="alimony">Alimony</option><option value="pension">Pension Benefits</option><option value="investment">Investment</option><option value="rental_royalty">Rental / Royalty</option><option value="other">Other</option></select></div></td><td><div id = "employandssn-'+timeNow+'" style ="display:none" ><div ><input disabled type="text" placeholder="Employer" value="" name="jobEmployerName" id="employer_name-'+timeNow+'" ></div><div  ><input type="tel" value="" name="employerContactInformationPhone" id="employer_phone_number-'+timeNow+'"  placeholder="(XXX) XXX XXXX" disabled></div></div></td><td><select  style = "display:none" name="other_income_type" id ="other_income_type-'+timeNow+'" disabled><option value="">Select Source</option><option value="cancelled_debt">Cancelled Debt</option><option value="court_awards">Court Awards</option><option value="jury_duty_pay">Jury Duty Pay</option><option value="cash_support">Cash Support</option><option value="prize_award">Gambling, Prizes or Awards</option></select></td></tr>'

	var clonedone = $(cloneRow).insertAfter($('[id^=baseIncomeRow-'+id+']:last'));


	

}

/*
 * Function to clone Income Row
 */
function getEnrollDiv(id){

		var s_idArray 	 =	id.split("-");
		var s_id			 =	s_idArray[1];
	    var val	= $('#applyingCoverage-'+s_id).val();


	if(val == 1){
			var timeNow = $.now();


	var cloneRow = "<table class=''><tr class = 'coverage'><td><input type='checkbox' name='employer_sponsored_insurance_enrolled' id='employer_sponsored_insurance_enrolled' value='1'/> Employer (even through a family member)</td><td><input type='checkbox' name='otherInsuranceStateCHIPProgram' id='otherInsuranceStateCHIPProgram' value='1'/> Childrens Health Insurance Program (CHIP)</td></tr>	<tr class = 'coverage'><td><input type='checkbox' name='otherInsurancePrivate' id='otherInsurancePrivate' value='1'/> Individual health plan (not from a job)</td><td><input type='checkbox' name='otherInsuranceVA' id='otherInsuranceVA' value='1'/>Veterans Affair's Health Care</td></tr><tr class = 'coverage'><td><input type='checkbox' name='otherInsuranceMedicare' id='otherInsuranceMedicare' value='1'/> Medicare</td><td><input type='checkbox' name='otherInsuranceTricare' id=otherInsuranceTricare' value='1'/>TriCare</td></tr><tr class = 'coverage'><td><input type='checkbox' name='otherInsuranceStateMedicaidProgram' id='otherInsuranceStateMedicaidProgram' value='1'/> Medicaid</td></tr></table>";
	
		$( "#alreadyenroll-"+s_id ).html(cloneRow);
		
		
		
	}if(val == 0){
		var cloneRow = "";
	
		$( "#alreadyenroll-"+s_id ).html(cloneRow);
		
	}
	

	

}
/*
 * Function to show last ZIP CODE value
 */
function getReasonDiv(id){
		var s_idArray 	 =	id.split("-");
		var s_id			 =	s_idArray[1];
	    var val	= $('#'+id).val();
	if(val == 'relocation'){
		var cloneRow = "<td>Last Zip Code </td> <td><div><input  type='text' placeholder='Last Zip Code' value='' name='sep_relocation_last_zip_code' id = 'sep_relocation_last_zip_code' class='form-control'></div></td>";
	
		$( "#last_zip_code-"+s_id ).html(cloneRow);
		
	}else{
		var cloneRow = "";
	
		$( "#last_zip_code-"+s_id ).html(cloneRow);
		
	}

}
/*
 * Function to show last ZIP CODE value
 */
function addPerson(){
var numItems = $('.countformbox').length;
// alert(numItems);alert(numItems);
// if(numItems == 1){
// var id	= numItems + 2;
// }else 
// var id	= numItems + 2;
// }	
 var id	= numItems + 2;
var tmp = '<div class="formbox countformbox" id="formbox'+id+'"><input type="hidden" name="applicant_type_id" id="applicant_type_id_'+id+'"  value = "'+numItems+'" />	<div class="info-container"><table class="applyingForCoverage" id="applyingForCoverage-'+id+'"><tr><td><span class="table-headers">Applying for Coverage?</span><select name="applyingCoverage" id="applyingCoveragehealth-'+id+'" onchange="hidefieldsOnNo(this.id)" ><option value="">Select...</option>		<option value="1">Yes</option><option value="0">No</option></select></td></tr></table><table class="contactBasicInfo" id="contactBasicInfo"><tbody><tr  id="form2_first-'+id+'" class = "form2_first"><td><span class="table-headers">First Name</span><br/><input type="text" name="addApplicantFirstName" id="addApplicantFirstName-'+id+'" /></td><td><span class="table-headers">Last Name</span><br/><input type="text" name="addApplicantLastName" id="addApplicantLastName-'+id+'" /></td><td><span class="table-headers">Suffix</span><br/><select name="addApplicantSuffix" id = "addApplicantSuffix-'+id+'">';

tmp += '<option value="">Select...</option><option value="Jr">Jr</option><option value="Sr">Sr</option><option value="III">III</option><option value="IV">IV</option></select></td></tr><tr id="form2_first-'+id+'"';

tmp += 'class = "form2_first relationcheck"><td><span class="table-headers">Relationship to You </span><br/><select onchange = "relationcheckpopup(this.id);" class="form-control" name="fahDependentRelationMJDropDown"  id ="fahDependentRelationMJDropDown-'+id+'""><option value="Myself"> Myself </option><option selected="" value="Spouse"> Spouse </option><option value="Child"> Child </option><option value="Father or Mother"> Father or Mother </option><option value="Grandfather or Grandmother"> Grandfather or Grandmother </option><option value="Grandson or Granddaughter"> Grandson or Granddaughter </option><option value="Uncle or Aunt"> Uncle or Aunt </option><option value="Nephew or Niece"> Nephew or Niece </option><option value="Cousin"> Cousin </option><option value="Adopted Child"> Adopted Child </option><option value="Foster Child"> Foster Child </option><option value="Son-in-law or Daughter-in-law"> Son-in-law or Daughter-in-law </option><option value="Brother-in-law or Sister-in-law"> Brother-in-law or Sister-in-law </option><option value="Mother-in-law or Father-in-law"> Mother-in-law or Father-in-law </option><option value="Brother or Sister"> Brother or Sister </option><option value="Ward"> Ward </option><option value="Stepparent"> Stepparent </option><option value="Stepson or Stepdaughter"> Stepson or Stepdaughter </option><option value="Sponsored Dependent"> Sponsored Dependent </option><option value="Dependent of a Minor Dependent"> Dependent of a Minor Dependent </option><option value="Ex-spouse"> Ex-spouse </option><option value="Guardian"> Guardian </option><option value="Court Appointed Guardian"> Court Appointed Guardian </option><option value="Collateral Dependent"> Collateral Dependent </option><option value="Life Partner"> Life Partner </option><option value="Annultant"> Annultant </option><option value="Trustee"> Trustee </option><option value="Other Relationship"> Other Relationship </option><option value="Other Relative"> Other Relative </option></select></td>	<td><span class="table-headers">Gender</span><br/><select name="applicantGender" id="applicantGender-'+id+'" >';
tmp += '<option value="">Select...</option><option value="fahSexMale">Male</option><option value="fahSexFemale">Female</option></select></td><td><span class="table-headers">Date Of Birth</span><br/><input type="text" class = "datepicker" name="addApplicantDateOfBirth" id="addApplicantDateOfBirth-'+id+'" /></td><td class="hideOnApplyingCoverageNo-'+id+'"><span class="table-headers">SSN</span><br/><input type="text" name="fahSSNTextboxForApplicant" id="fahSSNTextboxForApplicant-'+id+'" placeholder="XXX-XX-XXXX" /></td></tr></tbody></table>';

tmp += '<div id="basic-checkboxes-section"><div id="col-1"><table class ="isMarried form2_first" ><tr class = "form2_first"><td><input type="checkbox" name="isMarriedYes" id="isMarriedYes-'+id+'" value="1" onclick="togglemarried(this.id)"/> Married</td></tr></table>';



tmp += '<table class="tobaccoUser hideOnApplyingCoverageNo_0"><tr class = "form2_first"><td><input type="checkbox" name="tobaccoUser" id="tobaccoUser-'+id+'" value="1"/> Tobacco User</td></tr></table><table class="USCitizen"><tr  class = "form2_first"><td><input type="checkbox" name="fahImmigrationIsCitizenRadioYes" id="fahImmigrationIsCitizenRadioYes-'+id+'" value="1" onclick="toggleImmigrationDocs(this.id)" checked /> US Citizen<br/></td></tr><tr id="immigrationDocs-'+id+'" style="display:none;" class = "form2_first"><td><select name="DocumentType" id="DocumentType-'+id+'" onchange="getDocTypefields(this.id)" ><option value="">Select...</option><option value="1">Permanent Resident Card ("Green Card", I-551)</option><option value="2">Temporary I-551 Stamp (on Passport or I-94, I-94A)</option><option value="3">Machine Readable Immigrant Visa (with temporary I-551 language)</option><option value="4">Employment Authorization Card (EAD, I-766)</option><option value="5">Arrival/Departure Record (I-94, I-94A)</option><option value="6">Arrival/Departure Record in foreign passport (I-94)</option><option value="7">Foreign Passport</option><option value="8">Reentry Permit (I-327)</option><option value="9">Refugee Travel Document (I-571)</option><option value="10">Certificate of Eligibility for Non-Immigrant (F-1) Student Status (I-20)</option><option value="11">Certificate of Eligibility for Exchange Visitor (J-1) Status (DS2019)</option><option value="12">Notice of Action (I-797)</option></select></td></tr><tr  class = "form2_first" id="fieldAsperDocType-'+id+'" style="display:none;"></tr></table></div>';

tmp += '<div id="col-2" class="hideOnApplyingCoverageNo-'+id+'"><table class="RegisteredNativeAmerican"><tr class ="form2_first nativeAmrican"><td><input type="checkbox" name="native_american" id="native_american-'+id+'" value="1"/> Registered Native American	</td></tr></table><table class="FullTimeStudent"><tr class = "form2_first">	<td><input type="checkbox"name="full_time_student" id="full_time_student-'+id+'" value="1"/> Full-time Student</td></tr></table></div><div id="col-3"><table class="TaxStatus"><tr class = "form2_first singlemarriedtax" ><td><span class="table-headers">Tax Status for2015</span><br/><select name="single_tax_filing_status" id="single_tax_filing_status-'+id+'" onchange = "taxstatusSingleCheck(this.id);" ><option value="">Select...</option><option value="5">Single Filing Taxes</option><option value="6">Single,Claimed as Dependent</option><option value="7">Single, Not Filing Taxes</option></select><select name="married_tax_filing_status"id="married_tax_filing_status-'+id+'" onchange = "taxstatusMarriedCheck(this.id);"  style ="display:none" disabled><option value="">Select...</option><option value="1">Married, Filing Jointly</option><option value="2">Married, Filing Seperately</option><option value="3">Married, Claimed as Dependent</option><option value="4">Married, Not Filing Taxes</option></select></td>';

 tmp += '</tr></table></div></div><div class="give-margin-15-20 taxstatus"><h3>Income Sources</h3><p>Please list each source of income for this person for 2015. Enter amounts per year. This is required for lower prices. Estimates are okay.</p></div><table class="incomeSourceTable taxstatus"><tr id="baseIncomeRow-'+id+'" class = "income"><td><span class="table-headers">$</span><input type="text" value="" name="amount" id = "amount-'+id+'" onblur = "showamtoption(this.id);"></td><td><div id = "incometypediv-'+id+'" style = "display:none" ><select name="income_type" id = "incometype-'+id+'" onchange = "selectjobtype(this.id);" disabled ><option selected="" value="no_income">Select Source</option><option value="job">Job</option><option value="self_employed">Self Employed</option><option value="social_security">Social Security Benefits</option><option value="retirement">Retirement Benefits</option><option value="unemployment_benefits">Unemployment Benefits</option><option value="farming_fishing">Farming &amp; Fishing</option><option value="capital_gains">Capital Gains</option><option value="alimony">Alimony</option><option value="pension">Pension Benefits</option><option value="investment">Investment</option><option value="rental_royalty">Rental / Royalty</option><option value="other">Other</option></select></div></td><td><div id = "employandssn-'+id+'" style ="display:none" ><div><input disabled type="text" placeholder="Employer" value="" name="jobEmployerName" id = "employer_name-'+id+'" class="form-control"></div><div><input  disabled type="text" value="" name="employerContactInformationPhone"  id = "employer_phone_number-'+id+'" class="form-control" placeholder="(XXX) XXX XXXX" ></div></div></td><td><select name="other_income_type" class="form-control income-type" id ="other_income_type-'+id+'" style = "display:none" disabled><option value="">Select Source</option><option value="cancelled_debt">Cancelled Debt</option><option value="court_awards">Court Awards</option><option value="jury_duty_pay">Jury Duty Pay</option><optionvalue="cash_support">Cash Support</option><option value="prize_award">Gambling, Prizes or Awards</option></select></td></tr></table><div class="give-margin-15-20 taxstatus"><input type ="button" value = "+ Add Income" class = "btn-add-income"  id ="add_income-'+id+'" onclick = "cloneBaseIncomeRow(this.id);" /></div><table class="existing_coverage taxstatus"><tr id="" class = "coverage"><td>Is this person already enrolled in health insurance? </td><td><select name="has_health_insurance" id="applyingCoverage-'+id+'" onchange="getEnrollDiv(this.id)" ><option value="">Select...</option><option value="1">Yes</option> <option value="0">No</option></select></td></tr><tr><td><p>Which kind of insurance? </p></td></tr><tr><td><div id=""><div id = "alreadyenroll-'+id+'"  class="hideOnApplyingCoverageNo-'+id+'"></div></td></div><table><tr class = "coverage"><td>Does this person employer offerhealth insurance?  </td><td><select name="employer_offers_insurance" id="employer_offers_insurance-'+id+'" ><option value="">Select...</option><option value="1">Yes</option> <option value="0">No</option></select></td></tr></table></tr></table><table class="existing_coverage"><tr>Special EnrollmentReason</tr><tr id="" class = "coverage"><td>Did this person get rejected by Medicaid or CHIP since 10/31/2014? </td>	<td><select name="has_health_insurance" id="has_health_insurance-'+id+'"  ><option value=""></option><option value="1">Yes</option><option value="0">No</option></select></td></tr><tr class = "coverage"><td><p>What is this persons reason for applying for coverage? </p></td><td><select name="sep_reason" id="sep_reason-'+id+'" onchange="getReasonDiv(this.id)" ><option value="losing_coverage"> Losing health coverage </option><option value="relocation"> Moving </option><option value="marriage"> Got married or divorced </option><option value="had_baby"> Had a baby </option><option value="placed_for_adoption"> Placed for adoption </option><option value="placed_for_foster_care"> Placed for foster care </option><option value="gained_citizenship"> Gained citizenship </option><option value="left_incarceration"> Left Incarceration </option></select></td></tr><tr class = "coverage" ><td>What date? </td><td><div><input  type="text" placeholder="Date" value="" name="sep_reason_date" id = "sep_reason_date-'+id+'" class="form-control datepicker"   ></div></td></tr><tr class = "coverage"> <td><div id = "last_zip_code-'+id+'" ></div></td>	</tr></table></div></div>';

	$( "#cloneAllForm" ).append(tmp).find(".datepicker").datepicker({
        changeMonth: true,
	changeYear: true
    });  	  
	var health_coverage = $('#health_coverage').val() ;

	if(health_coverage == 0){
		$(".taxstatus").hide();
	}	
	
	}

/*
 * function to get field types for non us citizens 
 * based on selected doc required
 * parameter #DocumentType0 value
 * returns input fields in <td> to populate the <tr id="fieldAsperDocType">
 */
function getDocTypefields(id){
		var docTypeVal	= $('#'+id).val();
var s_idArray 	 =	id.split("-");
	var id			 =	s_idArray[1];
		switch(docTypeVal) {
		case '1':
			$('#fieldAsperDocType-'+id).show('slow');
			var theHtml = '<td><div style="margin:5% 0px;"><span class="table-headers">Alien number (optional)</span><br/><input type="text" name="AlienNumber" id="AlienNumber" /></div><div style="margin:5% 0px;"><span class="table-headers">Card number (optional)</span><br/><input type="text" name="CardNumber" id="CardNumber" /></div></td>';

			$('#fieldAsperDocType-'+id).html(theHtml);
			break;
		case '2':
			$('#fieldAsperDocType-'+id).show('slow');
			var theHtml = '<td><div style="margin:5% 0px;"><span class="table-headers"><span class="table-headers">Alien number (optional)</span><br/><input type="text" name="AlienNumber" id="AlienNumber" /></div></td>';

			$('#fieldAsperDocType-'+id).html(theHtml);
			break;
		case '3':
			$('#fieldAsperDocType-'+id).show('slow');
			var theHtml = '<td><div style="margin:5% 0px;"><span class="table-headers">Alien number (optional)</span><br/><input type="text" name="AlienNumber" id="AlienNumber" /></div><div style="margin:5% 0px;"><span class="table-headers">Passport number (optional)</span><br/><input type="text" name="PassportNumber" id="PassportNumber" /></div><div style="margin:5% 0px;"><span class="table-headers">Country of issuance (optional)</span><br/><input type="text" name="CountryOfIssuance" id="CountryOfIssuance" /></div></td>';

			$('#fieldAsperDocType-'+id).html(theHtml);
			break;
		case '4':
			$('#fieldAsperDocType-'+id).show('slow');
			var theHtml = '<td><div style="margin:5% 0px;"><span class="table-headers">Alien number (optional)</span><br/><input type="text" name="AlienNumber" id="AlienNumber" /></div><div style="margin:5% 0px;"><span class="table-headers">Card number (optional)</span><br/><input type="text" name="PassportNumber" id="PassportNumber" /></div><div style="margin:5% 0px;"><span class="table-headers">Document expiration date (optional)</span><br/><input type="text" name="DocExpDate" id="DocExpDate" class = "datepicker" /></div><div style="margin:5% 0px;"><span class="table-headers">Category code (optional)</span><br/><input type="text" name="CategoryCode" id="CategoryCode" /></div></td>';

			$('#fieldAsperDocType-'+id).html(theHtml).find(".datepicker").datepicker({
			changeMonth: true,
			changeYear: true
    });  	;
			break;
		case '5':
			$('#fieldAsperDocType-'+id).show('slow');
			var theHtml = '<td><div style="margin:5% 0px;"><span class="table-headers">I-94 number (optional)</span><br/><input type="text" name="I94Number" id="I94Number" /></div></td>';

			$('#fieldAsperDocType-'+id).html(theHtml);
			break;
		case '6':
			$('#fieldAsperDocType-'+id).show('slow');
			var theHtml = '<td><div style="margin:5% 0px;"><span class="table-headers">I-94 number (optional)</span><br/><input type="text" name="I94Number" id="I94Number" /></div><div style="float:left; width:45%;margin-right:5%;"><span class="table-headers">Passport number (optional)</span><br/><input type="text" name="PassportNumber" id="PassportNumber" /></div><div style="float:left; width:45%;margin-right:5%;"><span class="table-headers">Document expiration date optional </span><br/><input type="text" name="DocExpDate" id="DocExpDate" class ="datepicker"/></div><div style="width:45%;margin:2% 5% 0 0; float:left;"><span class="table-headers">Country of issuance (optional)</span><br/><input type="text" name="CountryOfIssuance" id="CountryOfIssuance" /></div></td>';

			$('#fieldAsperDocType-'+id).html(theHtml).find(".datepicker").datepicker({
			changeMonth: true,
			changeYear: true
    });  	;
			break;	
		case '7':
			$('#fieldAsperDocType-'+id).show('slow');
			var theHtml = '<td><div style="margin:5% 0px;"><span class="table-headers">Passport number (optional)</span><br/><input type="text" name="PassportNumber" id="PassportNumber" /></div><div style="float:left; width:45%;margin-right:5%;"><span class="table-headers">Document expiration date optional </span><br/><input type="text" name="DocExpDate" id="DocExpDate" class ="datepicker"/></div><div style="width:45%;margin:2% 5% 0 0; float:left;"><span class="table-headers">Country of issuance (optional)</span><br/><input type="text" name="CountryOfIssuance" id="CountryOfIssuance" /></div></td>';

			$('#fieldAsperDocType-'+id).html(theHtml).find(".datepicker").datepicker({
			changeMonth: true,
			changeYear: true
			});  	
			break;
		case '8':
			$('#fieldAsperDocType-'+id).show('slow');
			
			var theHtml = '<td><div style="float:left; width:45%;margin-right:5%;"><span class="table-headers">Alien number (optional)</span><br/><input type="text" name="AlienNumber" id="AlienNumber" /></div></td>';

			$('#fieldAsperDocType-'+id).html(theHtml);
			break;	
		case '9':
			$('#fieldAsperDocType-'+id).show('slow');
			var theHtml = '<td><div style="float:left; width:45%;margin-right:5%;"><span class="table-headers">Alien number (optional)</span><br/><input type="text" name="AlienNumber" id="AlienNumber" /></div></td>';

			$('#fieldAsperDocType-'+id).html(theHtml);
			break;	
		case '10':
			$('#fieldAsperDocType-'+id).show('slow');
			var theHtml = '<td><div style="float:left; width:45%;margin-right:5%;"><span class="table-headers">SEVIS ID</span><br/><input type="text" name="SevisID" id="SevisID" /></div></td>';

			$('#fieldAsperDocType-'+id).html(theHtml);
		break;	
		case '11':
			$('#fieldAsperDocType-'+id).show('slow');
			var theHtml = '<td><div style="float:left; width:45%;margin-right:5%;"><span class="table-headers">SEVIS ID</span><br/><input type="text" name="SevisID" id="SevisID" /></div></td>';

			$('#fieldAsperDocType-'+id).html(theHtml);
		break;
		case '12':
			$('#fieldAsperDocType-'+id).show('slow');
			var theHtml = '<td><div style="float:left; width:45%;margin-right:5%;"><span class="table-headers">Alien number (optional)</span><br/><input type="text" name="AlienNumber" id="AlienNumber" /></div><div style="float:left; width:45%;margin-right:5%;"><span class="table-headers">I-94 number (optional)</span><br/><input type="text" name="I94Number" id="I94Number" /></div></td>';

			$('#fieldAsperDocType-'+id).html(theHtml);
		break;			
		default:
			$('#fieldAsperDocType-'+id).hide('slow');
		}
}

/*
 * function to get field types for non us citizens 
 * based on selected doc required
 * parameter #DocumentType0 value
 * returns input fields in <td> to populate the <tr id="fieldAsperDocType">
 */
function getArrDepDocTypefields(docTypeVal){
		
		switch(docTypeVal) {
		case '1':
			$('#fieldAsPerArrDepDocType').show('slow');
			var theHtml = '<td><div style="float:left; width:45%;margin-right:5%;"><span class="table-headers">I-94 number (optional)</span><br/><input type="text" name="I94Number" id="I94Number" /></div><div style="float:left; width:45%;margin-right:5%;"><span class="table-headers">Passport number (optional)</span><br/><input type="text" name="PassportNumber" id="PassportNumber" /></div><div style="width:45%;margin:2% 5% 0 0; float:left;"><span class="table-headers">Document expiration date (optional)</span><br/><input type="text" name="DocExpDate" id="DocExpDate" class = "datepicker"/></div><div style="float:left; width:45%;margin:2% 5% 0 0;"><span class="table-headers">Country of issuance (optional)</span><br/><input type="text" name="CountryOfIssuance" id="CountryOfIssuance" /></div></td>';

			$('#fieldAsPerArrDepDocType').html(theHtml).find(".datepicker").datepicker({
        changeMonth: true,
	changeYear: true
    });  	;
			$('#fieldAsPerNotificationOfActionDocType').hide('slow');
			break;
		case '2':
			$('#fieldAsPerArrDepDocType').show('slow');
			var theHtml = '<td><div style="float:left; width:45%;margin-right:5%;"><span class="table-headers">Passport number (optional)</span><br/><input type="text" name="PassportNumber" id="PassportNumber" /></div><div style="float:left; width:45%;margin-right:5%;"><span class="table-headers">Passport expiration date (optional)</span><br/><input type="text" name="DocExpDate" id="DocExpDate" class ="datepicker"/></div><div style="width:45%;margin:2% 5% 0 0; float:left;"><span class="table-headers">Country of issuance (optional)</span><br/><input type="text" name="CountryOfIssuance" id="CountryOfIssuance" /></div></td>';

			$('#fieldAsPerArrDepDocType').html(theHtml).find(".datepicker").datepicker({
        changeMonth: true,
	changeYear: true
    });  	;
			$('#fieldAsPerNotificationOfActionDocType').hide('slow');
			break;
		case '3':
			$('#fieldAsPerArrDepDocType').show('slow');
			var theHtml = '<td><div style="float:left; width:45%;margin-right:5%;"><span class="table-headers">Alien number (optional)</span><br/><input type="text" name="AlienNumber" id="AlienNumber" /></div></td>';

			$('#fieldAsPerArrDepDocType').html(theHtml);
			$('#fieldAsPerNotificationOfActionDocType').hide('slow');
			break;
		case '4':
			$('#fieldAsPerArrDepDocType').show('slow');
			var theHtml = '<td><div style="float:left; width:45%;margin-right:5%;"><span class="table-headers">Alien number (optional)</span><br/><input type="text" name="AlienNumber" id="AlienNumber" /></div></td>';

			$('#fieldAsPerArrDepDocType').html(theHtml);
			$('#fieldAsPerNotificationOfActionDocType').hide('slow');
			break;
		case '5':
			$('#fieldAsPerArrDepDocType').show('slow');
			var theHtml = '<td><div style="float:left; width:45%;margin-right:5%;"><span class="table-headers">SEVIS ID</span><br/><input type="text" name="SevisID" id="SevisID" /></div></td>';

			$('#fieldAsPerArrDepDocType').html(theHtml);
			$('#fieldAsPerNotificationOfActionDocType').hide('slow');
			break;
		case '6':
			$('#fieldAsPerArrDepDocType').show('slow');
			var theHtml = '<td><div style="float:left; width:45%;margin-right:5%;"><span class="table-headers">SEVIS ID</span><br/><input type="text" name="SevisID" id="SevisID" /></div></td>';

			$('#fieldAsPerArrDepDocType').html(theHtml);
			$('#fieldAsPerNotificationOfActionDocType').hide('slow');
			break;
		case '7':
			$('#fieldAsPerArrDepDocType').show('slow');
			var theHtml = '<td><p>Enter one of these numbers (optional)</p><div style="float:left; width:45%;margin-right:5%;"><input style="width: auto;" type="radio" name="AlienNumberRadio" onclick="enterOneOfTheseNumers(this.value)" id="AlienNumberRadio" value="1"/> Alien number<br/><input style="width: auto;" type="radio" name="I94Radio" id="I94Radio" value="2" onclick="enterOneOfTheseNumers(this.value)"/> I-94<br/><input style="width: auto;" type="radio" name="otherDoc" id="otherDoc" value="0" onclick="enterOneOfTheseNumers(this.value)"/> Other document types and statuses</div><div style="float:left; width:45%;margin-right:5%;"><span class="table-headers">SEVIS ID</span><br/><input type="text" name="SevisID" id="SevisID" /></div></td>';

			$('#fieldAsPerArrDepDocType').html(theHtml);
			$('#fieldAsPerNotificationOfActionDocType').hide('slow');
			break;
		
		default:
			$('#fieldAsPerArrDepDocType').hide('slow');
			$('#fieldAsPerNotificationOfActionDocType').hide('slow');
		}
}

function enterOneOfTheseNumers(docTypeVal){
		switch(docTypeVal) {
		case '1':
			$('#fieldAsPerNotificationOfActionDocType').show('slow');
			var theHtml = '<td><div style="float:left; width:45%;margin-right:5%;"><span class="table-headers">Alien number (optional)</span><br/><input type="text" name="AlienNumber" id="AlienNumber" /></div></td>';

			$('#fieldAsPerNotificationOfActionDocType').html(theHtml);
			break;
		case '2':
			$('#fieldAsPerNotificationOfActionDocType').show('slow');
			var theHtml = '<td><div style="float:left; width:45%;margin-right:5%;"><span class="table-headers">I-94 number (optional)</span><br/><input type="text" name="I94Number" id="I94Number" /></div></div></td>';

			$('#fieldAsPerNotificationOfActionDocType').html(theHtml);
			break;
		default:
			$('#fieldAsPerNotificationOfActionDocType').hide('slow');
		}
}

/*
 * This fucntion hides some fields
 * when 'No' is selected for
 * 'Applying for Coverage'
 */
function hidefieldsOnNo(id){

	var applyingVal	= $('#'+id).val();
var s_idArray 	 =	id.split("-");
		var s_id			 =	s_idArray[1];
	  
	if(applyingVal == '0'){
		$('.hideOnApplyingCoverageNo-'+s_id).attr('disabled','disabled').hide('slow');
	}else{
		$('.hideOnApplyingCoverageNo-'+s_id).removeAttr('disabled').show('slow');
	}
}

