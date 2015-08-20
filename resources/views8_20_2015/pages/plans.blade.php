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

  <img src="/img/blue-circle.png" width="30"> 

  <img src="{{ URL::asset('img/blue-circle.png') }}" width="30"> 

who is applying?
</div>
<center><font color="blue"><b><u>MYSELF</u></b></font></center>

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
      <h2>My Family</h2>
      <div id="family-members">

 <center>Add Spouse Below</center>

<div class="family-member spouse-member" >
        Spouse Age <input type="text" size="3" class="age" /></select> Smoker? <input type="checkbox" class="tabacco" />
</div>
            <br />

            <center>Add Children Below only first 3 needed to calculate your tax credit and planned premium.</center>

            <center>Add Children Below only first 3 needed to calculate your tax credit and plann premium.</center>

      </div>

        <div id="family-member-row-template">
            
            <div class="family-member child_member">
              Child Age <input type="text" size="3" class="age" /></select> Smoker? <input type="checkbox" class="tabacco" />
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

  <img src="/img/blue-circle.png" width="30"> 

  <img src="{{ URL::asset('img/blue-circle.png') }}" width="30"> 

Yealy Household Income

    <div class="income-data">
    <div class="pull-left">
    <p>Annual Income</p>
    <input type="text" id="income-annual" />
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

  <img src="/img/blue-circle.png" width="30"> 

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

<div class="dropwrapper"/>
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
    <div class="moreplans" style="padding-top: 10px;  line-height: 15px;"/><center><h3 class="blue" style="line-height: 27px;">WANT MORE OPTIONS? <br /> (800)555-5555</h3> </center></div>
    
        
            
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

    $('#family-data-add-button').on('click', function(event) {
        var copy = $('#family-member-row-template').find('.family-member').clone();
        $('#family-members').append(copy);
        if($('#family-members').find('.family-member').length >= 4) {
          $(this).remove();
        }
        

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
			$("#show_plan").hide();
		
			
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

</script>
@endsection
