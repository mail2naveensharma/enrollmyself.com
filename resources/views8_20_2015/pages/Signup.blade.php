@extends('home')

@section('content')

<link href="{{ URL::asset('css/Signup.css') }}" rel='stylesheet' 
type='text/css'>

<div class="signupbody"/>

<div class="topbar" />
</div>

<div class="signupbodywrapper"/>

<div class="leftbar" />
</div>

<div class="rightbox" />
<center>
<h1>Step 1</h1>
</center>
<div class="formbox"/>

  {!! Form::open(['url' => 'Signup']) !!} 


	<div class="form-group"> 
<!-- form First Name -->
{!! Form::label('First', 'First') !!} 
{!! Form::text('First', null, ['class' => 'col-md4']) !!}
<br/>
<!-- form Last Name -->
{!! Form::label('Last', 'Last') !!} 
{!! Form::text('Last', null, ['class' => 'col-md4']) !!}
<br/>
<!-- form Suffix input -->
{!! Form::label('Suffix', 'Suffix') !!} 
{!! Form::select('suffix', array(
  'Jr.' => 'Jr',
  'Sr.' => 'Sr',
  'III' => 'III',
  'IV' => 'IV'
)) !!}
<br/>
</div>

		<!-- form email input -->
		<div class="form-group"> 
		{!! Form::label('Email', 'Email') !!}
		{!! Form::text('Email', null, ['class' => 'col-md4']) !!}
		</div>
   
		 <!-- form address input -->
		<div class="form-group"> 
				{!! Form::label('Address', 'Address') !!} 
				{!! Form::textarea('Address', null, ['class' => 'input-medium' , 'rows' => '1', 'cols' => '40']) !!}
				<br/><br/>
<!-- APT & Unit input -->
				{!! Form::label('Apt', 'Apt or Unit') !!} 
				{!! Form::text('Apt', null, ['class' => 'col-md3' ]) !!}
				<br/><br/>
<!-- City input -->
				{!! Form::label('City', 'City') !!} 
				{!! Form::text('City', Null, ['class' => 'col-md3' ]) !!}
				<br/><br/>
<!-- State drop down input -->
				{!! Form::label('State', 'State') !!}
				{!! Form::select('suffix', $states = array(
'Alabama'=>'AL',
'Alaska'=>'AK',
'Arizona'=>'AZ',
'Arkansas'=>'AR',
'California'=>'CA',
'Colorado'=>'CO',
'Connecticut'=>'CT',
'Delaware'=>'DE',
'Florida'=>'FL',
'Georgia'=>'GA',
'Hawaii'=>'HI',
'Idaho'=>'ID',
'Illinois'=>'IL',
'Indiana'=>'IN',
'Iowa'=>'IA',
'Kansas'=>'KS',
'Kentucky'=>'KY',
'Louisiana'=>'LA',
'Maine'=>'ME',
'Maryland'=>'MD',
'Massachusetts'=>'MA',
'Michigan'=>'MI',
'Minnesota'=>'MN',
'Mississippi'=>'MS',
'Missouri'=>'MO',
'Montana'=>'MT',
'Nebraska'=>'NE',
'Nevada'=>'NV',
'New Hampshire'=>'NH',
'New Jersey'=>'NJ',
'New Mexico'=>'NM',
'New York'=>'NY',
'North Carolina'=>'NC',
'North Dakota'=>'ND',
'Ohio'=>'OH',
'Oklahoma'=>'OK',
'Oregon'=>'OR',
'Pennsylvania'=>'PA',
'Rhode Island'=>'RI',
'South Carolina'=>'SC',
'South Dakota'=>'SD',
'Tennessee'=>'TN',
'Texas'=>'TX',
'Utah'=>'UT',
'Vermont'=>'VT',
'Virginia'=>'VA',
'Washington'=>'WA',
'West Virginia'=>'WV',
'Wisconsin'=>'WI',
'Wyoming'=>'WY'
))  !!}

<!-- zipcode -->
				{!! Form::label('Zip', 'Zip') !!} 
				{!! Form::text('Zip', Null, ['class' => 'col-md3' ]) !!}
				<br/><br/>			
<!-- zipcode -->
				{!! Form::label('Zip', 'Zip') !!} 
				{!! Form::text('Zip', Null, ['class' => 'col-md3' ]) !!}
				<br/><br/>		
<!-- radial button -->
				{!! Form::label('same_mailing', 'Is your Mailing Address Different than your Home Address?') !!} 
				{!! Form::checkbox('sameaddress', 'no', false) !!}
				<br/><br/>			
</div>   
		<!-- form address input -->
		<div class="form-group"> {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
		</div>
</div>



<div class="formboxright" style="display: none;"/>
<!-- form on right ADDRESS TWO -->

<center>
<div class"formtitle"/>
Address Two
</div>
</center>


	<div class="form-group"> 
<!-- form First Name -->
{!! Form::label('First', 'First') !!} 
{!! Form::text('First', null, ['class' => 'col-md4']) !!}
<br/>
<!-- form Last Name -->
{!! Form::label('Last', 'Last') !!} 
{!! Form::text('Last', null, ['class' => 'col-md4']) !!}
<br/>
<!-- form Suffix input -->
{!! Form::label('Suffix', 'Suffix') !!} 
{!! Form::select('suffix', array(
  'Jr.' => 'Jr',
  'Sr.' => 'Sr',
  'III' => 'III',
  'IV' => 'IV'
)) !!}
<br/>
</div>

		<!-- form email input -->
		<div class="form-group"> 
		{!! Form::label('Email', 'Email') !!}
		{!! Form::text('Email', null, ['class' => 'col-md4']) !!}
		</div>
   
		 <!-- form address input -->
		<div class="form-group"> 
				{!! Form::label('Address', 'Address') !!} 
				{!! Form::textarea('Address', null, ['class' => 'input-medium' , 'rows' => '1' , 'cols' => '40']) !!}
				<br/><br/>
<!-- APT & Unit input -->
				{!! Form::label('Apt', 'Apt or Unit') !!} 
				{!! Form::text('Apt', null, ['class' => 'col-md3' ]) !!}
				<br/><br/>
<!-- City input -->
				{!! Form::label('City', 'City') !!} 
				{!! Form::text('City', Null, ['class' => 'col-md3' ]) !!}
				<br/><br/>
<!-- State drop down input -->
				{!! Form::label('State', 'State') !!}
				{!! Form::select('suffix', $states = array(
'Alabama'=>'AL',
'Alaska'=>'AK',
'Arizona'=>'AZ',
'Arkansas'=>'AR',
'California'=>'CA',
'Colorado'=>'CO',
'Connecticut'=>'CT',
'Delaware'=>'DE',
'Florida'=>'FL',
'Georgia'=>'GA',
'Hawaii'=>'HI',
'Idaho'=>'ID',
'Illinois'=>'IL',
'Indiana'=>'IN',
'Iowa'=>'IA',
'Kansas'=>'KS',
'Kentucky'=>'KY',
'Louisiana'=>'LA',
'Maine'=>'ME',
'Maryland'=>'MD',
'Massachusetts'=>'MA',
'Michigan'=>'MI',
'Minnesota'=>'MN',
'Mississippi'=>'MS',
'Missouri'=>'MO',
'Montana'=>'MT',
'Nebraska'=>'NE',
'Nevada'=>'NV',
'New Hampshire'=>'NH',
'New Jersey'=>'NJ',
'New Mexico'=>'NM',
'New York'=>'NY',
'North Carolina'=>'NC',
'North Dakota'=>'ND',
'Ohio'=>'OH',
'Oklahoma'=>'OK',
'Oregon'=>'OR',
'Pennsylvania'=>'PA',
'Rhode Island'=>'RI',
'South Carolina'=>'SC',
'South Dakota'=>'SD',
'Tennessee'=>'TN',
'Texas'=>'TX',
'Utah'=>'UT',
'Vermont'=>'VT',
'Virginia'=>'VA',
'Washington'=>'WA',
'West Virginia'=>'WV',
'Wisconsin'=>'WI',
'Wyoming'=>'WY'
))  !!}

<!-- zipcode -->
				{!! Form::label('Zip', 'Zip') !!} 
				{!! Form::text('Zip', Null, ['class' => 'col-md3' ]) !!}
				<br/><br/>			
<!-- zipcode -->
				{!! Form::label('Zip', 'Zip') !!} 
				{!! Form::text('Zip', Null, ['class' => 'col-md3' ]) !!}
				<br/><br/>		

</div>


</div>
</div>

<div class="spacer" style="height: 50px; width: 960px; float: clear-both;"/>
</div>
		</div>
</div>


{!! Form::close() !!}

<script>
$(document).ready(function() {
    $("input[sameaddress$='']").click(function() {
        var test = $(this).val();

        $("div.formboxrigh").show();
    });
});
</script>

@stop
