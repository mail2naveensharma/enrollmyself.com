@extends('home')

@section('content')

<div class="planbody"/>
     <div class="planbodywrapper"/>

<!---------------WHO NEEDS COVERAGE FORM---------------->
<input type="hidden" name="step_id" id="step_id" value="{{ $step_id }}" />
<input type="hidden" name="applicant_id" id="applicant_id" value="{{ $applicant_id }}" />
<input type="hidden" name="countperson1" id="countperson1"  value = "3" />
<div class="formbox" id="formbox1" style ="display:none">
	<div class="info-container">			
		<table class="contactName" id="contactName">
			<tbody>
				<tr id="form1_first" class = "form1_first">
					<td>
						<span class="table-headers">First Name</span><br/>	
						<input type="text" name="contactFirstName" id="contactFirstName" />
					</td>
					<td>
						<span class="table-headers">Middle Name</span><br/>	
						<input type="text" name="contactMiddleName" id="contactMiddleName" />
					</td>
					<td>
						<span class="table-headers">Last Name</span><br/>
						<input type="text" name="contactLastName" id="contactLastName" />
					</td>
					<td>
						<span class="table-headers">Suffix</span><br/>
								<select id="contactSuffix"  name="contactSuffix">
							<option value="">Select...</option>
							<option value="Jr">Jr.</option>
							<option value="Sr">Sr.</option>
							<option value="III">III</option>
							<option value="IV">IV</option>
							</select>
					</td>
				</tr>
			</tbody>
		</table>

		<div class="give-margin-10-20">
			<h4>Home Address: </h4>
		</div>
		<table class="homeAddress" id="homeAddress">
			<tbody>
				<tr id="form1_first" class = "form1_first">
					<td colspan="2">
						
						<span class="table-headers">Street Address</span><br/>
						<input type="text" name="contactAddressStreetName1" id = "contactAddressStreetName1" />
					</td>
					<td>
						<span class="table-headers">APT/STE #</span><br/>
						<input type="text" name="contactAddressStreetName2" id = "contactAddressStreetName2" />
					</td>	
				</tr>
				<tr id="form1_first" class = "form1_first">
					<td>
						<span class="table-headers">City</span><br/>
						<input type="text" name="contactAddressCity" id = "contactAddressCity" />
					</td>
					<td>
						<span class="table-headers">State</span><br/>
					 	<select class="" onchange="" id="contactAddressState" name="contactAddressState" data-toggle="dropdown">
							<option value="">Select...</option>
							<option value="AL">Alabama</option>
								<option value="AK">Alaska</option>
								<option value="AZ">Arizona</option>
								<option value="AR">Arkansas</option>
								<option value="CA">California</option>
								<option value="CO">Colorado</option>
								<option value="CT">Connecticut</option>
								<option value="DE">Delaware</option>
								<option value="DC">District Of Columbia</option>
								<option value="FL">Florida</option>
								<option value="GA">Georgia</option>
								<option value="HI">Hawaii</option>
								<option value="ID">Idaho</option>
								<option value="IL">Illinois</option>
								<option value="IN">Indiana</option>
								<option value="IA">Iowa</option>
								<option value="KS">Kansas</option>
								<option value="KY">Kentucky</option>
								<option value="LA">Louisiana</option>
								<option value="ME">Maine</option>
								<option value="MD">Maryland</option>
								<option value="MA">Massachusetts</option>
								<option value="MI">Michigan</option>
								<option value="MN">Minnesota</option>
								<option value="MS">Mississippi</option>
								<option value="MO">Missouri</option>
								<option value="MT">Montana</option>
								<option value="NE">Nebraska</option>
								<option value="NV">Nevada</option>
								<option value="NH">New Hampshire</option>
								<option value="NJ">New Jersey</option>
								<option value="NM">New Mexico</option>
								<option value="NY">New York</option>
								<option value="NC">North Carolina</option>
								<option value="ND">North Dakota</option>
								<option value="OH">Ohio</option>
								<option value="OK">Oklahoma</option>
								<option value="OR">Oregon</option>
								<option value="PA">Pennsylvania</option>
								<option value="RI">Rhode Island</option>
								<option value="SC">South Carolina</option>
								<option value="SD">South Dakota</option>
								<option value="TN">Tennessee</option>
								<option value="TX">Texas</option>
								<option value="UT">Utah</option>
								<option value="VT">Vermont</option>
								<option value="VA">Virginia</option>
								<option value="WA">Washington</option>
								<option value="WV">West Virginia</option>
								<option value="WI">Wisconsin</option>
								<option value="WY">Wyoming</option>
 
						</select>
					</td>
					<td>
						<span class="table-headers">Zip</span><br/>	
						<input type="text" name="contactAddressZip" id = "contactAddressZip" />
					</td>
				</tr>
			</tbody>
		</table>
		<div class="give-margin-10-20">
			<p>Is your mailing address same as home?</p>
			 <input type="radio" name="contactMailingAddressSame" id="contactMailingAddressSameYes" onclick='openmailingaddress(this.value)' value="1"/> Yes<br/>
			<input type="radio" name="contactMailingAddressSame" id="contactMailingAddressSameNo" onclick='openmailingaddress(this.value)' value="0"/> No
		</div>       
		<div style="display:none" id="show_mailingaddresss">
			<div class="give-margin-15-20">
				<h4>Mailing Address: </h4>
			</div>
			<table class="mailingAddress" id="mailingAddress" >
				<tbody>
					<tr id="form1_first" class = "form1_first" >
						<td colspan="2">
							
							<span class="table-headers">Street Address</span><br/>	
							<input type="text" name="contactMailingAddressStreetName1" id = "contactMailingAddressStreetName1" />
						</td>
						<td>
							<span class="table-headers">APT/STE #</span><br/>
							<input type="text" name="contactMailingAddressStreetName2" id = "contactMailingAddressStreetName2" />
						</td>
					</tr>
					<tr id="form1_first" class = "form1_first">
						<td>
							<span class="table-headers">City</span><br/>	
							<input type="text" name="contactMailingAddressCity" id = "contactMailingAddressCity" />
						</td>
						<td>
							<span class="table-headers">State</span><br/>
							<select class="" onchange="" id="contactMailingAddressState" name="contactMailingAddressState" data-toggle="dropdown">
								<option value="">Select...</option>
								<option value="AL">Alabama</option>
								<option value="AK">Alaska</option>
								<option value="AZ">Arizona</option>
								<option value="AR">Arkansas</option>
								<option value="CA">California</option>
								<option value="CO">Colorado</option>
								<option value="CT">Connecticut</option>
								<option value="DE">Delaware</option>
								<option value="DC">District Of Columbia</option>
								<option value="FL">Florida</option>
								<option value="GA">Georgia</option>
								<option value="HI">Hawaii</option>
								<option value="ID">Idaho</option>
								<option value="IL">Illinois</option>
								<option value="IN">Indiana</option>
								<option value="IA">Iowa</option>
								<option value="KS">Kansas</option>
								<option value="KY">Kentucky</option>
								<option value="LA">Louisiana</option>
								<option value="ME">Maine</option>
								<option value="MD">Maryland</option>
								<option value="MA">Massachusetts</option>
								<option value="MI">Michigan</option>
								<option value="MN">Minnesota</option>
								<option value="MS">Mississippi</option>
								<option value="MO">Missouri</option>
								<option value="MT">Montana</option>
								<option value="NE">Nebraska</option>
								<option value="NV">Nevada</option>
								<option value="NH">New Hampshire</option>
								<option value="NJ">New Jersey</option>
								<option value="NM">New Mexico</option>
								<option value="NY">New York</option>
								<option value="NC">North Carolina</option>
								<option value="ND">North Dakota</option>
								<option value="OH">Ohio</option>
								<option value="OK">Oklahoma</option>
								<option value="OR">Oregon</option>
								<option value="PA">Pennsylvania</option>
								<option value="RI">Rhode Island</option>
								<option value="SC">South Carolina</option>
								<option value="SD">South Dakota</option>
								<option value="TN">Tennessee</option>
								<option value="TX">Texas</option>
								<option value="UT">Utah</option>
								<option value="VT">Vermont</option>
								<option value="VA">Virginia</option>
								<option value="WA">Washington</option>
								<option value="WV">West Virginia</option>
								<option value="WI">Wisconsin</option>
								<option value="WY">Wyoming</option>
 
							</select>
						</td>
						<td>
							<span class="table-headers">Zip</span><br/>
							<input type="text" name="contactMailingAddressZip" id = "contactMailingAddressZip" />
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<table class="contactMethods">
			<tr id="form1_first" class = "form1_first">
				<td>
					<span class="table-headers">Phone Number xxx-xxx-xxxx</span><br/>
					<input type="text" name="contactPhone" id="contactPhone" />
				</td>
					<td>
					<span class="table-headers">Email Address</span><br/>
					<input type="text" name="contactEmailAddress" id="contactEmailAddress" />
				</td>
			</tr>
		</table>
		<!--<table class="prefferedSpokenWritten">
			<tr id="form1_first" class = "form1_first">
				<td>
					<span class="table-headers">Preferred Spoken Language (optional)</span><br/>
					<select name="contactSpokenLanguage" id="contactSpokenLanguage" >
						<option selected value="1">English</option>
						<option value="2">Spanish</option>
						<option value="3">Vietnamese</option>
						<option value="4">Tagalog</option>
						<option value="5">Russian</option>
						<option value="6">Portuguese</option>
						<option value="7">Arabic</option>
						<option value="8">Chinese</option>
						<option value="9">French</option>
						<option value="10">French Creole</option>
						<option value="11">German</option>
						<option value="12">Gujarati</option>
						<option value="13">Hindi</option>
						<option value="14">Korean</option>
						<option value="15">Polish</option>
						<option value="16">Urdu</option>
						<option value="17">Other</option>
					</select>
				</td>
				<td>
					<span class="table-headers">Preferred Written Language (optional)</span><br/>
					<select name="contactWrittenLanguage" id="contactWrittenLanguage" >
						<option selected value="1">English</option>
						<option value="2">Spanish</option>
						<option value="3">Vietnamese</option>
						<option value="4">Tagalog</option>
						<option value="5">Russian</option>
						<option value="6">Portuguese</option>
						<option value="7">Arabic</option>
						<option value="8">Chinese</option>
						<option value="9">French</option>
						<option value="10">French Creole</option>
						<option value="11">German</option>
						<option value="12">Gujarati</option>
						<option value="13">Hindi</option>
						<option value="14">Korean</option>
						<option value="15">Polish</option>
						<option value="16">Urdu</option>
						<option value="17">Other</option>
					</select>
				</td>
				</tr>
		</table>-->
		
		<!--<div class="give-margin-15-20">
			<p>Do you want to read your notices about your application on this website?</p>
			 <input type="radio" name = "noticesOnlineNoRadio" id  = "noticesOnlineNoRadio" value= "1" /> Yes
		</div>-->
		<tr id="form1_first" class = "form1_first">
			<td>
			<div class="give-margin-15-20">
				<p>Do you want to find out if you can get help paying for health coverage?</p>
				 <input type="radio" name = "healthCoverage" id  = "healthCoverageYes" value= "1" checked /> Yes
				 <input type="radio" name = "healthCoverage" id  = "healthCoverageNo" value= "0" /> No
			</div>
			</td>
		</tr>
			
		<div class="give-margin-15-20">
			<input type ="button" value = "Save and Continue" class = "btn-save-test"  id ="btn-save-test" onclick = "showApplicantinfodiv();" />
		</div>
	</div>
</div>


<div class="formbox countformbox" id="formbox2">
<input type="hidden" name="applicant_type_id" id="applicant_type_id_2"  value = "0" />
	<div class="info-container">
		<table class="applyingForCoverage" id="applyingForCoverage">
			<tr>
				<td style="width:40%"><h3>You</h3></td>
				<td>
					<span class="table-headers">Applying for Coverage?</span>
					<select name="applyingCoverage" id="applyingCoveragehealth-0" onchange="hidefieldsOnNo(this.id)" >
						<option value="">Select...</option>
						<option value="1">Yes</option> 
						<option value="0">No</option>
					</select>
				</td>
			</tr>
		</table>
		
		<table class="contactBasicInfo" id="contactBasicInfo">
			<tbody>
				<tr  id="form2_first" class = "form2_first">
					<td>
						<span class="table-headers">First Name</span><br/>	
						<input type="text" name="addApplicantFirstName" id="addApplicantFirstName-0" />
					</td>
				
					<td>
						<span class="table-headers">Last Name</span><br/>
						<input type="text" name="addApplicantLastName" id="addApplicantLastName-0" />
					</td>
					<td>
						<span class="table-headers">Suffix</span><br/>
						<select name="addApplicantSuffix" id = "addApplicantSuffix-0">
							<option value="">Select...</option>
							<option value="Jr">Jr</option>
							<option value="Sr">Sr</option>
							<option value="III">III</option>
							<option value="IV">IV</option>
						  </select>
					</td>
				</tr>
				<tr id="form2_first" class = "form2_first">
					<td>
						<span class="table-headers">Gender</span><br/>	
						<select name="applicantGender" id="applicantGender-0" >
							<option value="">Select...</option>
							<option value="fahSexMale">Male</option> 
							<option value="fahSexFemale">Female</option>
						</select>
					</td>
				
					<td>
						<span class="table-headers">Date Of Birth</span><br/>
						<input type="text" name="addApplicantDateOfBirth" id="addApplicantDateOfBirth-0" />
					</td>
					<td class="hideOnApplyingCoverageNo-0">
						<span class="table-headers">SSN</span><br/>
						<input type="text" name="fahSSNTextboxForApplicant" id="fahSSNTextboxForApplicant-0" placeholder="XXX-XX-XXXX" />
					</td>
				</tr>
			</tbody>
		</table>
		
		<div id="basic-checkboxes-section">
			<div id="col-1">
				<table class="USCitizen">
					<tr  class = "form2_first">
						<td>
							<input type="checkbox" name="fahImmigrationIsCitizenRadioYes" id="fahImmigrationIsCitizenRadioYes-0" value="1" onclick="toggleImmigrationDocs(this.id)" checked /> US Citizen<br/>
						</td>
					</tr>
					<tr id="immigrationDocs-0" style="display:none;" class = "form2_first">
						<td>
							<select name="DocumentType" id="DocumentType-0" onchange="getDocTypefields(this.id)" >
									<option value="">Select...</option>
									<option value="1">Permanent Resident Card ("Green Card", I-551)</option>
									<option value="2">Temporary I-551 Stamp (on Passport or I-94, I-94A)</option>
									<option value="3">Machine Readable Immigrant Visa (with temporary I-551 language)</option>
									<option value="4">Employment Authorization Card (EAD, I-766)</option>
									<option value="5">Arrival/Departure Record (I-94, I-94A)</option>
							</select>
						</td>
					</tr>
					<tr  class = "form2_first" id="fieldAsperDocType-0" style="display:none;">
						<!-- to be loaded with js -->
					</tr>
				</table>
			
				<table class="tobaccoUser hideOnApplyingCoverageNo_0">
					<tr class = "form2_first">
						<td>
							<input type="checkbox" name="tobaccoUser" id="tobaccoUser-0" value="1"/> Tobacco User
						</td>
					</tr>
				</table>
				
				<table class="isMarried form2_first" >
					<tr class = "form2_first">
						<td>
							<input type="checkbox" name="isMarriedYes" id="isMarriedYes-0" value="1" onclick="togglemarried(this.id)"/> Married
						</td>
					</tr>
				</table>
			</div>
			<div id="col-2" class="hideOnApplyingCoverageNo-0">
				<table class="RegisteredNativeAmerican">
					<tr class = "form2_first">
						<td>
							<input type="checkbox" name="native_american" id="native_american-0" value="1"/> Registered Native American
						</td>
					</tr>
				</table>
				
				<table class="FullTimeStudent">
					<tr class = "form2_first">
						<td>
							<input type="checkbox" name="full_time_student" id="full_time_student-0" value="1"/> Full-time Student
						</td>
					</tr>
				</table>
			</div>
			<div id="col-3">
				<table class="TaxStatus">
					<tr class = "form2_first" >
						<td>
							<span class="table-headers">Tax Status for 2015</span><br/>
							<select name="single_tax_filing_status" id="single_tax_filing_status-0" >
									<option value="">Select...</option>
									<option value="5">Single Filing Taxes</option>
									<option value="6">Single Filing Taxes</option>
									<option value="7">Single, Claimed as Dependent</option>
									<option value="8">Single, Not Filing Taxes</option>
							</select>
							<select name="married_tax_filing_status" id="married_tax_filing_status-0" style ="display:none" disabled>
									<option value="">Select...</option>
									<option value="1">Married, Filing Jointly</option>
									<option value="2">Married, Filing Seperately</option>
									<option value="3">Married, Claimed as Dependent</option>
									<option value="4">Married, Not Filing Taxes</option>
									
							</select>
						</td>
					</tr>
				</table>
			</div>
		</div>

	<div class="give-margin-15-20">
		<h3>Income Sources</h3>
		<p>Please list each source of income for this person for 2015. Enter amounts per year. This is required for lower prices. Estimates are okay.</p>
	</div>


	<table class="incomeSourceTable">
		<tr id="baseIncomeRow-0" class = "income">
			<td>
				<span class="table-headers">$</span>
				<input type="text" value="" name="amount" id = "amount-xyz" onblur = "showamtoption(this.id);">
			</td>
			<td>
				<div id = "incometypediv-xyz" style = "display:none" >
					<select name="income_type" id = "incometype-xyz" onchange = "selectjobtype(this.id);" disabled >
						<option selected="" value="no_income">Select Source</option>
						<option value="job">Job</option>
						<option value="self_employed">Self Employed</option>
						<option value="social_security">Social Security Benefits</option>
						<option value="retirement">Retirement Benefits</option>
						<option value="unemployment_benefits">Unemployment Benefits</option>
						<option value="farming_fishing">Farming &amp; Fishing</option>
						<option value="capital_gains">Capital Gains</option>
						<option value="alimony">Alimony</option>
						<option value="pension">Pension Benefits</option>
						<option value="investment">Investment</option>
						<option value="rental_royalty">Rental / Royalty</option>
						<option value="other">Other</option>
					</select>
				</div>
			</td>
			<td>
				<div id = "employandssn-xyz" style ="display:none" >
					<div>
						<input disabled type="text" placeholder="Employer" value="" name="jobEmployerName" id = "employer_name-xyz" class="form-control">
					</div>

					<div>
						<input  disabled type="text" value="" name="employerContactInformationPhone"  id = "employer_phone_number-xyz" class="form-control" placeholder="(XXX) XXX XXXX" >
					</div>
				</div>
			</td>
			<td>
				
					<select name="other_income_type" class="form-control income-type" id ="other_income_type-xyz" style = "display:none" disabled>
						<option value="">Select Source</option>
						<option value="cancelled_debt">Cancelled Debt</option>
						<option value="court_awards">Court Awards</option>
						<option value="jury_duty_pay">Jury Duty Pay</option>
						<option value="cash_support">Cash Support</option>
						<option value="prize_award">Gambling, Prizes or Awards</option>
					</select>
			
			</td>
		</tr>
	</table>
		

			<div class="give-margin-15-20">
				<input type ="button" value = "+ Add Income" class = "btn-add-income"  id ="add_income-0" onclick = "cloneBaseIncomeRow(this.id);" />
			</div>
	<table class="existing_coverage">
			<tr id="" class = "coverage">
				<td>Is this person already enrolled in health insurance? </td>
				<td>
					<select name="has_health_insurance" id="applyingCoverage-0" onchange="getEnrollDiv(this.id)" >
						<option value="">Select...</option>
						<option value="1">Yes</option> 
						<option value="0">No</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><p>
					Which kind of insurance? 
					</p>
				</td>
			</tr>
			<tr>
				<td>
				<div id="">
					<div id = "alreadyenroll-0"  class="hideOnApplyingCoverageNo-0">
				
					</div>
				</td>
					</div>
				<table>
						<tr class = "coverage">
							<td>Does this person's employer offer health insurance?  </td>
							<td>
								<select name="employer_offers_insurance" id="employer_offers_insurance-0"  >
									<option value="">Select...</option>
									<option value="1">Yes</option> 
									<option value="0">No</option>
								</select>
							</td>
						</tr>
					</table>
				
			
			
			</tr>
			

		
		
	</table>	
	
	<table class="existing_coverage">
			<tr>Special Enrollment Reason</tr>
			<tr id="" class = "coverage">
				<td>Did this person get rejected by Medicaid or CHIP since 10/31/2014? </td>
				<td>
					<select name="has_health_insurance" id="has_health_insurance-0"  >
						<option value=""></option>
						<option value="1">Yes</option> 
						<option value="0">No</option>
					</select>
				</td>
			</tr>
			<tr class = "coverage">
				<td><p>
					What is this person's reason for applying for coverage? 
					</p>
				</td>
				<td>
					<select name="sep_reason" id="sep_reason-0" onchange="getReasonDiv(this.id)" >
						<option value="losing_coverage"> Losing health coverage </option>
						<option value="relocation"> Moving </option>
						<option value="marriage"> Got married or divorced </option>
						<option value="had_baby"> Had a baby </option>
						<option value="placed_for_adoption"> Placed for adoption </option>
						<option value="placed_for_foster_care"> Placed for foster care </option>
						<option value="gained_citizenship"> Gained citizenship </option>
						<option value="left_incarceration"> Left Incarceration </option>
					</select>
				</td>
			</tr>
			<tr class = "coverage" >
				 <td>What date? 
				 </td>
				 <td>
				 <div>
						<input  type="text" placeholder="Date" value="" name="sep_reason_date" id = "sep_reason_date-0" class="form-control">
				 </div>
				 </td>
			</tr>
			<tr class = "coverage"> 
				<td>
				<div id = "last_zip_code-0" >
					
				</div>
				</td>			
			</tr>

		
		
	</table>
			
		</div>	
</div>	


<div class="clear"/>
<div id = "cloneAllForm">


</div>

	<div class="give-margin-15-20">
		<input type ="button" value = "Save and Continue" class = "btn-save-form2"  id ="btn-save-form2"  />
	</div>


	<div class="give-margin-15-20">
		<input type ="button" value = "Add Person" class = ""  id ="" onclick = "addPerson();" />
	</div>
	</div>
</div>


	

<input type="hidden" id="_token" value="{{ csrf_token() }}" />
@stop

@section('js')

<script type="text/javascript" src="js/applicant.js"></script>

<script type="text/javascript">


	
	$(function() {

	//var step_id	= 2 ;
	var step_id = $('#step_id').val() ;
	
   $('.formbox').hide();
   $('#formbox'+step_id).show();
});

function showlist(id){
	
var myage	= $('#myself-age').val();
if(myage == ''){
	alert('Please Enter Details');
}	
	reloadjson();
	setTimeout(showlistexec(id), 4000);
	
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


/*
 * Function to clone applicant relative
 */
function cloneApplicant(){
	$( "#second-applicant-clone" ).clone().appendTo( "#applyingForRelatveContainer" );
}
/*
 * Function to save first form
 */

	$('.btn-save-test').click(function() {
		var data1 = {};
     data1._token = $('#_token').val();
   // data._token = $('#_token').val();

		//var step_id =  $('#step_id').val();
		
		var items = [];
		
		var item_order = 1;
	
		

		$('table tr.form1_first').each(function() {
			var row = {};
			$(this).find('input,select,textarea').each(function() {
			
				if ($(this).is(':checkbox')) {
					if ($(this).is(':checked')) {
						row[$(this).attr('name')] = 1;
					}
					else {
						row[$(this).attr('name')] = 0;
					}
				}else if ($(this).is(':radio')) {
					
					if ($(this).is(':checked')) {
					
						var result = $(this).attr('id');//.split('-');
						if(result){
						var name         = result;//[0];/* //(split - after name ) */
						}			
						row[name] = 1;
					}
					else {
	
						var result = $(this).attr('id');//.split('-');
						if(result){
						var name         = result;//[0];/* //(split - after name ) */
						}
						row[name] = 0;
					}
				}else {
						
					  row[$(this).attr('name')] = $(this).val();
				
					
				}
			});
			//row['item_order'] = item_order;
			//row['step_id'] = step_id;
			item_order++;
			
			items.push(row);
		});
			data1.info = JSON.stringify(items);
			data1.step_id = 1;
			data1.applicant_id = $('#applicant_id').val();
	
				$.post('/saveform/view', data1, function(result) {
					var jsonAplicantArray = JSON.parse(result);
					console.log(jsonAplicantArray);
					var id  = jsonAplicantArray.id ;
					 var contactFirstName 			=	 jsonAplicantArray.contactFirstName;
					 var contactLastName		 	= 	 jsonAplicantArray.contactLastName;
					 var addApplicantSuffix         =	 jsonAplicantArray.contactSuffix;
					$('#addApplicantFirstName-0').val(contactFirstName);
					$('#addApplicantLastName-0').val(contactLastName);
					// $('#addApplicantSuffix').val(addApplicantSuffix);
						$('#applicant_id').val(id);
						 $("#formbox1").hide();
						 $("#formbox2").show();
							

						}
					);

	});

	/*
	* Function to save sixth form
	*/

	$('.btn-save-form2').click(function() {

	 var numItems = $('.countformbox').length;

	  for(var i = 2;i<=numItems + 1;i++){
		var data1 = {};
		data1._token = $('#_token').val();
		var items = [];
		var incomes = [];
		var coverage = [];
		var item_order = 1;

	$('div #formbox'+i+' table tr.form2_first').each(function() {
		
			var row = {};
			$(this).find('input,select,textarea').each(function() {
		
				if($(this).attr('name') == 'applicantGender'){
					if($(this).val() == 'fahSexMale' ){
						row['fahSexMale']   = 1;	
						row['fahSexFemale'] = 0;
					}if($(this).val() == 'fahSexFemale'){
						row['fahSexFemale'] = 1;	
						row['fahSexMale']   = 0;	
						
					}
											
				}
					
				if ($(this).is(':checkbox')) {
					if ($(this).is(':checked')) {
						row[$(this).attr('name')] = 1;
					}
					else {
						row[$(this).attr('name')] = 0;
					}
				}else if ($(this).is(':radio')) {
					
					if ($(this).is(':checked')) {
						var result = $(this).attr('id');//.split('-');
						if(result){
						var name         = result;//[0];/* //(split - after name ) */
						}			
						row[name] = 1;
					}
					else {
						var result = $(this).attr('id');//.split('-');
						if(result){
						var name         = result;//[0];/* //(split - after name ) */
						}
						row[name] = 0;
					}
				}else {
					if($(this).attr('name') != 'applicantGender'){
					  row[$(this).attr('name')] = $(this).val();
					}
				}
			});
			item_order++;
			items.push(row);
			
		});
		
		$('div #formbox'+i+' table tr.income').each(function() {
				
			var row = {};
			$(this).find('input,select,textarea').each(function() {
		    var isDisabled = $(this).prop('disabled');
			if($('#amount').val() != ''){
				
			
			if (!isDisabled )
				{
				
			
				if($(this).attr('name') == 'applicantGender'){
					if($(this).val() == 'fahSexMale' ){
						row['fahSexMale']   = 1;	
						row['fahSexFemale'] = 0;
					}if($(this).val() == 'fahSexFemale'){
						row['fahSexFemale'] = 1;	
						row['fahSexMale']   = 0;	
						
					}
											
				}
					
				if ($(this).is(':checkbox')) {
					if ($(this).is(':checked')) {
						row[$(this).attr('name')] = 1;
					}
					else {
						row[$(this).attr('name')] = 0;
					}
				}else if ($(this).is(':radio')) {
					
					if ($(this).is(':checked')) {
						var result = $(this).attr('id');//.split('-');
						if(result){
						var name         = result;//[0];/* //(split - after name ) */
						}			
						row[name] = 1;
					}
					else {
						var result = $(this).attr('id');//.split('-');
						if(result){
						var name         = result;//[0];/* //(split - after name ) */
						}
						row[name] = 0;
					}
				}else {
					if($(this).attr('name') != 'applicantGender'){
					  row[$(this).attr('name')] = $(this).val();
					}
				}
				
			 }
			 
			 
			}
			});
			
			incomes.push(row);
		});
		$(' div #formbox'+i+' table tr.coverage').each(function() {
					
			var row = {};
			$(this).find('input,select,textarea').each(function() {
		    var isDisabled = $(this).prop('disabled');
			
				
			
			if (!isDisabled )
				{
		
					
				if ($(this).is(':checkbox')) {
					if ($(this).is(':checked')) {
						row[$(this).attr('name')] = 1;
					}
					else {
						row[$(this).attr('name')] = 0;
					}
				}else if ($(this).is(':radio')) {
					
					if ($(this).is(':checked')) {
						var result = $(this).attr('id');//.split('-');
						if(result){
						var name         = result;//[0];/* //(split - after name ) */
						}			
						row[name] = 1;
					}
					else {
						var result = $(this).attr('id');//.split('-');
						if(result){
						var name         = result;//[0];/* //(split - after name ) */
						}
						row[name] = 0;
					}
				}else {
					
					  row[$(this).attr('name')] = $(this).val();
					
				}
				
			
			 
			 
			}
			});
			
			coverage.push(row);
		});
			data1.info = JSON.stringify(items);
			data1.income = JSON.stringify(incomes);
			data1.coverage = JSON.stringify(coverage);
			data1.step_id = 2;
			data1.applicant_type_id = $('#applicant_type_id_'+i).val();
			data1.applicant_id = $('#applicant_id').val();
				$.post('/saveform/view', data1, function(result) {
					
						//	alert(result);
						
			 // $("#formbox1").hide();
			 // $("#formbox2").show();
							

						}
					);

		}		 
	});
		

</script>
@endsection
