<html>
	<head>
		<title>Enroll Myself </title>
		
		<link href='//fonts.googleapis.com/css?family=Lato:100' rel='stylesheet' type='text/css'>
        
          <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>


    <script src="/js/jquery.maskMoney.min.js"></script>
    <script src="/js/accounting.min.js"></script>

    <script src="/js/jquery.ba-dotimeout.min.js"></script>



        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Oswald:700' rel='stylesheet' type='text/css'>
        <link href='/css/basic.css' rel='stylesheet' type='text/css'>
        
	</head>

 <script src="{{ URL::asset('js/jquery.maskMoney.min.js') }}"></script>
 <script src="{{ URL::asset('js/accounting.min.js') }}"></script>
 <script src="{{ URL::asset('js/jquery.ba-dotimeout.min.js') }}"></script>
 <link href="{{ URL::asset('css/basic.css') }}" rel='stylesheet' type='text/css'>

  
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Oswald:700' rel='stylesheet' type='text/css'>

	</head

	<body>
    @include('header')
    <div class="container"/>
    @yield('content')
    </div>
  @include('footer')

  @yield('js')

    </body>
    </html>
