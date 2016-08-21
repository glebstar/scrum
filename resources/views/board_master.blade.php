<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="_token" content="{!! csrf_token() !!}"/>
		<title>Scrummy board</title>
		<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/materialize.min.css')}}" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="{{ asset('/datetimepicker/jquery.datetimepicker.css')}}" />
		<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
	</head>
	<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle Navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#"><img src="/images/scrumylogo.png" alt="Scrumy" width="30" height="30"></a>
			</div>

			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav">
					<li><a href="{{ url('/') }}">Home</a></li>
				</ul>

				<ul class="nav navbar-nav navbar-right">
					@if (Auth::guest())
						<li><a href="{{ url('/auth/login') }}">Login</a></li>
						<li><a href="{{ url('/auth/register') }}">Register</a></li>
					@else
						<li class="dropdown">						
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }} <span class="caret"></span></a>
							<ul class="dropdown-menu" role="menu">
								<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
							</ul>
						</li>
					@endif
				</ul>
			</div>
		</div>
	</nav>

	@yield('content')	
		<footer>
			<div class="footer">
			</div>
		</footer>

		<script src="{{ asset('/custom_js/jquery.min.js') }}"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<script src=" {{ asset('/custom_js/materialize.min.js') }} "></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
		<script src="{{ asset('/datetimepicker/build/jquery.datetimepicker.full.js') }}"></script>
		<script  src="{{ asset('/custom_js/newtimer.js') }}?v={{ config('app.script_version') }}"></script>
		<script  src="{{ asset('/custom_js/board.js') }}?v={{ config('app.script_version') }}"></script>
	</body>
</html>