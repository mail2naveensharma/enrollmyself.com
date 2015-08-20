@extends('home')



@section('content')

<div class="planbody"/>
     <div class="planbodywrapper"/>

<!---------------WHO NEEDS COVERAGE FORM---------------->
<input type="hidden" name="step_id" id="step_id" value="{{ 1 }}" />
<input type="hidden" name="applicant_id" id="applicant_id" value="{{ 2 }}" />
<input type="hidden" name="countperson1" id="countperson1"  value = "3" />
<input type="hidden" name="health_coverage" id="health_coverage" value="{{3}}" />
<div class="formbox" id="" style ="">
	<div class="info-container">	
		<div id ="confirm_and_sign">Confirm and Sign

Before submitting your application, please review and verify that you agree with the following statements.

If you have questions, please give us a call at (866) 927-9074.</div>
<div  id = "errorshow" style = "display:none;color: #1B526D;background-color: #F9FDFF;border-color: #79C0DB;border-radius: 2px;padding: 15px 20px;position: relative;margin: -1px 0px 15px;">
	You must agree to all statements before you can continue. If you can't agree, please call us.
	</div>
	<div id = "showdiv" >
		<table class="contactName" id="contactName">
			<tbody>
				<thead>
				<td>Agree?</td>
				<td>Statement</td>
				
				
				</thead>
				<tr id="form1_first" class = "form1_first">
					<td>
						<input type="checkbox" name="isMarriedYes" id="isMarriedYes-0" value="1" /> 
					</td>
					<td>
						<span class="table-headers">No one applying for coverage is in jail</span><br/>	
					
					</td>
			
				</tr>
				<tr id="form1_first" class = "form1_first">
					<td>
						<input type="checkbox" name="isMarriedYes" id="isMarriedYes-0" value="1"/> 
					</td>
					<td>
						<span class="table-headers">I give permission to the federal marketplace to access my tax returns for up to 5 years to verify my income for subsidy purposes. I can revoke this permission at anytime. </span><br/>	
					
					</td>
			
				</tr>
				<tr id="form1_first" class = "form1_first">
					<td>
						<input type="checkbox" name="isMarriedYes" id="isMarriedYes-0" value="1" /> 
					</td>
					<td>
						<span class="table-headers">I will notify the insurer if anything on this application changes. I can do this through the federal marketplace. I understand a change could affect our eligibility for plans and subsidies.  </span><br/>	
					
					</td>
			
				</tr>
				<tr id="form1_first" class = "form1_first">
					<td>
						<input type="checkbox" name="isMarriedYes" id="isMarriedYes-0" value="1" /> 
					</td>
					<td>
						<span class="table-headers"> I'm signing this application under penalty of perjury, which means I've provided true answers to all of the questions to the best of my knowledge. I know that I may be subject to penalties under federal law if I intentionally provide false or untrue information.
</span><br/>	
					
					</td>
			
				</tr>
				<tr id="form1_first" class = "form1_first">
					<td>
						<input type="checkbox" name="isMarriedYes" id="isMarriedYes-0" value="1" /> 
					</td>
					<td>
						<span class="table-headers">I acknowledge Enrollment Myself as my agent of record and authorize them to submit and sign this application on my behalf. </span><br/>	
					
					</td>
			
				</tr>
			</tbody>
		</table>
		<div class="give-margin-15-20">
			<input type ="button" value = "Save and Continue" class = "btn-save-submit"  id ="btn-save-submit" onclick = "showApplicantinfodiv();" />
		</div>
	</div>	
	<div id ="confirm" style = "display:none">
	
<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 text-center">
				<span class="glyphicon glyphicon-ok" style="color: rgb(41, 212, 41); font-size: 160px;"></span>
				<h1 style="color: black;">Congratulations!</h1>
				<br>
				<p class="lead">Sit back and relax.</p>
				<p class="lead">
				We will submit your application to the federal data hub and the insurer. You should receive a confirmation email sometime today. Your confirmation id is
				<strong>000002</strong>
				.
				</p>
				<p class="lead">
				If you have any questions, please give us a call at
				<a href="tel:8557722663">(866) 927-9074</a>
				. Thanks for choosing Enroll Myself, and congratulations on getting covered!
				</p>
			</div>
		</div>

</div>	
</div>	
</div>	
</div>	



<!--********************************************* Registered native american **************************************/-->	

<input type="hidden" id="_token" value="33" />
<input type="hidden" id="relationvalue"  name = "relationvalue" value="" />
@stop

@section('js')

<script type="text/javascript" src="js/applicant.js"></script>
<script type="text/javascript">
/*
 * Function to save first form
 */

	$('.btn-save-submit').click(function() {
		var data1 = {};
     data1._token = $('#_token').val();
    var result = 0 ;
		$('table tr.form1_first').each(function() {
		
			var row = {};
			$(this).find('input,select,textarea').each(function() {
			
				if ($(this).is(':checkbox')) {
					if ($(this).is(':checked')) {
						row[$(this).attr('name')] = 1;
					}
					else {
						result = 1 ;
						 $('#errorshow').show(); 
					}
				}
			});
			
			
		});
		
	if(result == 0){
		 $('#showdiv').hide(); 
		 $('#confirm_and_sign').hide(); 
		 $('#errorshow').hide(); 
		 $('#confirm').show(); 
		
		
	}	

	});
	
	</script>
@endsection
