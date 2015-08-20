@extends('home')

@section('content')

<div class="planbody"/>
     <div class="planbodywrapper"/>


<!-----------------TAX CREDIT INFO SECTION----------- -->
<div id="plan-meta">

<input type="hidden" id="myself-zipcode" value="{{ $zipcode }}" />
<input type="hidden" id="_token" value="{{ csrf_token() }}" />
<input type="hidden" id="credit_value" value="0" />

	<input type="hidden" id="state" value="0" />
			<input type="hidden" id="fpl" value="0" />
			<input type="hidden" id="Chip" value="0" />
			<input type="hidden" id="Adult" value="0" />
			<input type="hidden" id="county" value="0" />
			<input type="hidden" id="ap" value="0" />

<div class="boxleft"/>
<div class="boxone"/>
  <div class="title" style="margin-left: 20px; padding-top: 5px; font-size: 20; px;color: #293bc0;"/>
  <div class="number" style="color:white; position: absolute; margin-top: 2px; margin-left: 10px; font-size: 18px;"/> 1</div>

  <img src="{{ URL::asset('img/blue-circle.png') }}" width="30"> 

Who Is Applying?
</div>
<center>
<div class="sectitle">
<b>Myself</b>
</div>
</center>

<div class="myself-data">
    <div class="pull-left">
    <p>AGE</p>
    <input type="text" id="myself-age" />
    </div>
    <div class="pull-right">
    <p>Tobacco?</p>
    <input type="checkbox" id="myself-tabacco" />
    </div>
	
</div>


</div>

<div class="boxtwo"/>
  <div class="family-data">
      <div class="sectitle" style="padding-top: 20px; padding-bottom: 15px;">
     <center><b>My Family</b></center> 
      </div>
      <div id="family-members">
<div class="spouse"style="padding-bottom: 15px;"/>
 <center><b><u>Add Spouse Below</u></b></center>
</div>
<div class="family-member spouse-member" >
        Spouse Age <input type="text" size="3" class="age" /></select> Tobacco? <input type="checkbox" class="tabacco" />
</div>
            <br />

            <center>Add Children Below. <br/>Only first 3 needed to calculate your tax credit and plan premium.</center>
            <br />
      </div>

        <div id="family-member-row-template">
            <div class="family-member child_member ">
              Child Age <input type="text" size="3" class="age" /></select> Tobacco? <input type="checkbox" class="tabacco" />
			
			 <div id = "tooltiptitle" style ="display:none" class ="pull-right tooltiptitle" style = " border: 2px solid #FF8484;width: 32px;height: 32px;font-size: 14px;font-style: italic;font-family: georgia;line-height: inherit;vertical-align: middle;padding: 4px 10px;border-radius: 18px;text-align: center;background-color: #FFF;">
			 <span title="This person appears to be eligible for Medicaid and/or CHIP, and so does not qualify for subsidized insurance." class="info-sign" data-toggle="tooltip" data-placement="bottom" data-container="body">i</span></div>
            </div>
        </div>
      <button id="family-data-add-button" class="btn btn-primary"><i class="icon icon-plus"></i> Add Child</button>
      <button id="show_list" style ="display:none" class="btn btn-primary" onclick = "showlist(2000);" ><i class="icon icon-plus"></i> Show Plans </button>
  </div>

</div>


</div>     
<div class="boxright"/>
<div class="boxthree"/>
  <div class="title" style="margin-left: 20px; padding-top: 5px; font-size: 20; px;color: #293bc0;"/>
  <div class="number" style="color:white; position: absolute; margin-top: 2px; margin-left: 10px; font-size: 18px;"/> 2</div>

  <img src="{{ URL::asset('img/blue-circle.png') }}" width="30"> 

Yearly Household Income

    <div class="income-data">
    <div class="pull-left">
    <p>Annual Income</p>
    <b style="font-size: 18px;">$</b><input type="text" id="income-annual" />
    </div>
    <div class="pull-right">
    <p>Household Size</p>
    <input type="text" id="income-household" />
    </div>
    </div>

</div>
</div>
<div class="boxfour"/>
  <div class="title" style="margin-left: 20px; padding-top: 5px; font-size: 20; px;color: #293bc0;"/>
  <div class="number" style="color:white; position: absolute; margin-top: 2px; margin-left: 10px; font-size: 18px;"/> 3</div>

  <img src="{{ URL::asset('img/blue-circle.png') }}" width="30"> 

How Much Is My Tax Credit?

<div class="credit-data">
    <h2 id="credit-result">Fill Out Your Information To Find Out!</h2>
</div>

</div>
</div>
</div> 

</div> <!-- #plan-meta -->

<div class="clear"/></div>

<!-----------------SEARCH BOX SECTION----------- -->



<div class="searchbox" />

<div class="dropwrapper" />
    <div class="searchboxwrapper" />

<div class="dropwrapper"/>
<div class="dropdown">
    <select class="btn btn-default dropdown-toggle" type="button" id="menu1" data-toggle="dropdown" onchange="showlistexec(2000); return false">
	<option value="1">Lowest Price</option>
	<option  value="1">Least Expensive</option>
	<option  value="2">Least Deductible</option>
	</select>
    </div>
</div>

<div class="dropwrapper"/>
<div class="dropdown">
    <select class="btn btn-default dropdown-toggle" type="button" style="text-align:left!" onchange="showlistexec(2000); return ;" id="carrier" >
		<option value="">Carrier </option>
		<option  value="">All </option>
		@foreach ($carrierArr as $carrier)
			<option  value="{{$carrier['IssuerName']}}">{{$carrier['IssuerName']}}</option>
		@endforeach
	</select>
    </div>
</div>

<div class="dropwrapper"/>
<div class="dropdown">
    <select class="btn btn-default dropdown-toggle" type="button"  onchange="showlistexec(2000); return false" id="network" data-toggle="dropdown">
		<option value="">Network </option>
		<option  value="">All </option>
		<option value="PPO">PPO </option>
		<option  value="EPO">EPO </option>
		<option value="HMO">HMO </option>
		<option  value="POS">POS </option>
	</select>

    </div>
</div>

<div class="dropwrappertop"/>
<div class="dropdown">
    <select class="btn btn-default dropdown-toggle" type="button" id="metal" data-toggle="dropdown"  onchange="showlistexec(2000); return false">
		<option value="">Metal Level </option>
		<option  value="">All </option>
		<option value="Gold">Gold </option>
		<option  value="Silver">Silver </option>
		<option value="Bronze">Bronze </option>
		<option value="Platinum">Platinum </option>
		
	</select>
</div>
    </div>
    </div></div> 
    <div class="moreplans" style="padding-top: 10px;  line-height: 15px;"/><center><h3 class="blue" style="line-height: 27px;">WANT MORE OPTIONS? <br /> (866) 927-9074</h3> </center></div>
    
        
            
                </div>

<div class="clear"/></div>



<div id = "show_plan" style = "display:none" >

</div>

</div>

@stop

@section('js')
<script type="text/javascript">
$(function() {

  // Add currency mask to input field
  $('#income-annual').maskMoney({
    precision: 0,
    allowZero: false,
  });

var cloneCount = 1 ;

    $('#family-data-add-button').on('click', function(event) {
		
        var copy = $('#family-member-row-template').find('.family-member').clone().attr('id', 'family-member'+ cloneCount);
         
		  copy = copy.append('<div id = "tooltip_'+cloneCount+'" class ="pull-right tooltiptitle" style = "display:none; border: 2px solid #FF8484;width: 22px;height: 22px;font-size: 14px;font-style: italic;font-family: georgia;line-height: inherit;vertical-align: middle;padding: 3px 8px;border-radius: 18px;text-align: center;background-color: #FFF;"><span title="Based on the information provided, this person appears to be eligible for Medicaid and/or CHIP and therefore will not qualify for subsidized insurance through the marketplace. If you are claiming this person on your tax return, you should include them in household size box" class="info-sign" data-toggle="tooltip" data-placement="bottom" data-container="body">i</span></div>');
		  copy = copy.append('<input type="hidden" class="changeval" id = "child_member_id" name = "child_member_id" value = "'+cloneCount+'"/>');
		  
		  
        $('#family-members').append(copy);
        if($('#family-members').find('.family-member').length >= 4) {
          $(this).remove();
        }
        
	cloneCount++;
    });



$(document).on('change keyup', '#plan-meta input', function() {
  $('#plan-meta').doTimeout('meta-submit', 500, function() {
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
		tabacco: $(this).find('.tabacco').is(':checked'),
		changeval: $(this).find('.changeval').val(),
		
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
			$("#show_plan").hide();
		$(result.membersNotValid).each(function(index, element) {
				
			$('#tooltip_'+element.changeval).show();
		
		});
		
      } else {
        $('#credit-result').text('Fill Out Your Information To Find Out!');
      }

    }, "json").done(function() { showlistexec(2000);
  });
  });
});




});

function showlist(id){
	
var myage	= $('#myself-age').val();
if(myage == ''){
	alert('Please Enter Details');
}	
	reloadjson();
	setTimeout(showlistexec(id), 4000);
	
}	


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
/* function to show applicant form 
*/
function showApplicantForm(id,spremim){
	var queryString="plan_id="+id+"&premium_cost="+spremim;

		window.location.href="/applicants/?"+queryString
	
	
}
</script>
@endsection
