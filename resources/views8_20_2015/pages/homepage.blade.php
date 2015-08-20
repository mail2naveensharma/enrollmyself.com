@extends('home')
<meta name="_token" content="{{ csrf_token() }}"/>
@section('content')
<center>

<form action="{{ route('plans') }}" method="get"  onsubmit="get_counties(); return false;">
<div class="enterzip"/>

<div class="enterzipwrapper"/>
<div class="zipleft"/>
GOT 2 MIN? <br /> GET ENROLLED!
<br />
<div class="textfield"/>
Please Enter <br /> Your Zipcode: <input size="12" class="round" type="text" id="zip_input" name="zip"><br>

</div>
</div>

<!--<div class="zipcenter"/>-->
<img src="{{ URL::asset('img/florida.png') }}" style="width: 500px;"/>


<!- for adding different county's->
	 

		<div class="county" id="county_div" style="display:none; position: fixed; top:150px;">
				<div style="text-align:right; margin-bottom:5px; margin-right:10px; font-size:150%; font-weight:600;" onclick="hide_p();">Close(X)</div>
				<div class="countycontainer" id="county_inner_div" style="margin-top:10px; overflow-y:scroll; height:430px;">

							<!-fake countys->

								 <div class="countypick">
								  COUNTY One
										</div>
							  
							  <div class="countypick">
								  COUNTY Two
										</div>
							  
							  <div class="countypick">
								  COUNTY Three
										</div>
							  
								<div class="countypick">
								  COUNTY Four
										</div>
								  
									<div class="countypick">
								  COUNTY Five
										</div>

									<div class="countypick">
								  COUNTY Six
										</div>

							  <div class="countypick">
								  COUNTY Seven
							</div>
				</div>
		</div>

<! end of fake countys ->

</form>

</center>

@stop

<script>

function get_counties(){
	
		var zip	=	$('#zip_input').val();
		var get_url	=	'{{ route('plans') }}?json_zip='+zip;
		$.getJSON(get_url, function(obj) {
			if(obj['cnt'] == 0){
				alert('No records found for you input: '+zip);
			}
			
			if(obj['cnt'] == 1){
				
				 for(var key in obj['result']) {
					 
					//var params	=	"'"+obj['result'][key]['StateCode']+"','/"+obj['result'][key]['County']+"'";
					//console.log(params);
					if(obj['check'] == 1){
					check_data(obj['result'][key]['countyfips'], obj['result'][key]['countyname']);
					}else{
						check_data(obj['result'][key]['StateCode'], obj['result'][key]['County']);
					}	
				 }
			}else{	
		
				  var html_county	=	'';
				  for(var key in obj['result']) {
					 if(obj['check'] == 2){
						var params	=	"'"+obj['result'][key]['StateCode']+"','"+obj['result'][key]['County']+"'";
						html_county	+=	'<a onclick="check_data('+params+');"><div class="countypick">'+obj['result'][key]['County']+'</div></a>';
					 }else{
						 var params	=	"'"+obj['result'][key]['countyfips']+"','"+obj['result'][key]['countyname']+"'";
						 html_county	+=	'<a onclick="check_data('+params+');"><div class="countypick">'+obj['result'][key]['countyname']+'</div></a>';
					 } 
					

				}
				if(html_county != ''){
					$('#county_inner_div').html(html_county);
					$('#county_div').show();
				}
			}
		});
		
}

function hide_p(){
	$('#county_div').hide();
}


function check_data(county,county_name){
	
		var zip	=	$('#zip_input').val();
		var get_url	=	'{{ route('plans') }}?zip='+zip+'&county_code='+county_name;
		$.getJSON(get_url, function(obj) {
			if(obj['cnt'] == 0){
				
					alert('No records found for COUNTY: '+county_name);
			}else{
			//alert('here'+window.location.href+'{{url()}}');
				window.location.href = '{{url()}}/plans?zip='+zip+'&county='+county_name;
			}

		});
}
</script>
