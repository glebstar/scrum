<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Scrumy</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/style.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
	
	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
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
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"> Projects<span class="caret"></span></a>
							<ul class="dropdown-menu create_project_dropdown" role="menu">
								<li><p>Create Project</p></li>
								{!! Form::open(['url' => 'saveProject']) !!}
								<input type="hidden" name="user_id" value="{{ Auth::user()->id}}">
								<li><center><input type="text" class="form-control" name="project_name" id="project_name" placeholder="project name"/></center></li>	
								<li><center><input type="submit" value="Add" id="submitProjectAdd" class="btn btn-danger"></center></li>
								{!! Form::close() !!}
								<li class="divider"></li>
								<li><p>Search Projects by Name</p></li>
								<li><center><form><input type="text" class="form-control" name="search_project_name" id="search_ project_name" placeholder="project name"/></form></center></li>	
								<li><center><input type="submit" value="Create" id="searchProject" class="btn btn-primary"></center></li>
								

							</ul>
						</li>

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

	<!-- Scripts -->
	<!--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script> -->
	<script src="{{ asset('/custom_js/canvasjs.min.js') }}"></script>
	<script src="{{ asset('/custom_js/jquery.min.js') }}"></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script> -->
<script src=" {{ asset('/custom_js/bootstrap.min.js') }} "></script>
<script src=" {{ asset('/custom_js/materialize.min.js') }} "></script>
<script type="text/javascript">
	var listHeight = ($('body').height() - ($('header').height() + $('footer').height()) - 90);
	
	$( ".add-card" ).click(function() {
		$(this).addClass('hidden');
		$(this).next().removeClass('hidden');
		$(this).next().find('textarea').val('');
	});
	$( ".close-button" ).click(function() {
		$(this).parents('.add-card-form').addClass('hidden');
		$(this).parents('.add-card-form').prev().removeClass('hidden');
	});
	$( ".add-card-form form" ).submit(function( event ) {
		event.preventDefault();
		var title = $(this).find('textarea').val();

		var itemNum = []
		$( ".item-number span" ).each(function( index ) {
			itemNum.push($(this).html());
		});
		var max = Math.max.apply(Math,itemNum);
		max = max+1;
		var textVal = $(this).find('textarea').val();
		var insertTarget = $(this).data('insert');
		$('#'+insertTarget).append('<div class="list-item clearfix"><div class="item-body"><p class="item-title">'+textVal+'</p><div class="clearfix"><div class="title-panel"><span title="Comments" class="glyphicon glyphicon-comment" aria-hidden="true"></span><span class="number">0</span><span title="Description" class="glyphicon glyphicon-tasks" aria-hidden="true"></span><span class="number">0</span><span title="Attachments" class="glyphicon glyphicon-paperclip" aria-hidden="true"></span><span class="number">0</span></div><div class= "item-number pull-right">#<span>'+max+'</span></div></div><div class="clearfix"><div class="members-list pull-right clearfix"></div></div></div><p class="start-card" data-target="doing-lists">Start</p></div>');
		hideForm($(this).data('target'));
	});

	$(document).on("click",".list-item .item-body",function() {
	    $('#card-display').modal('show');

	});		
	$(document).on("click",".start-card",function() {
	    var html = $(this).parent().find('.item-body').html();
	    var target = $(this).data('target');
	   $(this).parent().remove();
	    $('#'+target).append('<div class="list-item clearfix"><div class="item-body">'+html+'</div><p class="status-card"><span class="pause pull-left double-status" data-target="todo-lists">Pause</span><span class="done pull-right double-status" data-target="done-lists">Done</span></p></div>');
	});	

	$(document).on("click",".double-status",function() {
	    var html = $(this).parents('.list-item').find('.item-body').html();
	    var target = $(this).data('target');
	    var cardTarget = ''
	    if(target == 'todo-lists') {
	    	cardTarget = '<p class="start-card" data-target="doing-lists">Start</p>';
	    } else {
	    	cardTarget = '<p class="completed">Completed</p>';
	    }

	   $(this).parents('.list-item').remove();
	    $('#'+target).append('<div class="list-item clearfix"><div class="item-body">'+html+'</div>'+cardTarget+'</div>');
	});	

	$(document).ready(function() {
	    $('select').material_select();
	    $('.caret').html('');
	    $('.datepicker').pickadate({
		    selectMonths: true, // Creates a dropdown to control month
		    selectYears: 15 // Creates a dropdown of 15 years to control year
	    });
	    $('#card-display').on('shown.bs.modal', function() {
	    	createPrio(); 
	    });
	    

	});
	function hideForm(id) {
		$('#'+id).addClass('hidden');
		$('#'+id).prev().removeClass('hidden');
	}
	function createPrio() {
		var x = 0;
		$('#priority ul').html('');
		$( ".list-item" ).each(function( index ) {
		   x++;
		   $('#priority ul').append('<li class=""><span>Option '+x+'</span></li>');
		});
	}

</script>
	

</body>
</html>
