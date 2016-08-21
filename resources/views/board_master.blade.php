<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="_token" content="{!! csrf_token() !!}"/>
		<title>Scrummy board</title>
		<!--<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous"> -->
		<link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
		<link href="{{ asset('/css/materialize.min.css')}}" rel="stylesheet">
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

	</body>
</html>
<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script> -->
<script src="{{ asset('/custom_js/jquery.min.js') }}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src=" {{ asset('/custom_js/materialize.min.js') }} "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.js"></script>
<script src="//cdn.rawgit.com/Eonasdan/bootstrap-datetimepicker/e8bddc60e73c1ec2475f827be36e1957af72e2ea/src/js/bootstrap-datetimepicker.js"></script>
<script  src="{{ asset('/custom_js/timer.js') }}"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script> -->
<script type="text/javascript">
	var listHeight = ($('body').height() - ($('header').height() + $('footer').height()) - 90);
	console.log(listHeight);
	$( ".add-card" ).click(function() {
		$(this).addClass('hidden');
		$(this).next().removeClass('hidden');
		$(this).next().find('textarea').val('').focus();
	});
	$( ".close-button" ).click(function() {
		$(this).parents('.add-card-form').addClass('hidden');
		$(this).parents('.add-card-form').prev().removeClass('hidden');
	});
	$( ".add-card-form form" ).submit(function( event ) {
		event.preventDefault();

		var title = $(this).find('textarea').val();
		var CSRF_TOKEN = $('meta[name="_token"]').attr('content');
		var data = {_token: CSRF_TOKEN, card_title:title, project_id: {{  $projectId }}};

		var _self = this;

		$.post('/addcard', data, function(data){
			var itemNum = [];
			$( ".item-number span" ).each(function( index ) {
				itemNum.push($(_self).html());
			});

			card_members[data.new_id] = [];

			var textVal = $(_self).find('textarea').val();
			var insertTarget = $(_self).data('insert');
			$('#'+insertTarget).append('<div id="card-number-' + data.new_id + '" class="list-item clearfix"><div class="item-body"><p class="item-title">'+textVal+'</p><div class="clearfix"><div class="title-panel"><span title="Comments" class="glyphicon glyphicon-comment" aria-hidden="true"></span><span class="number">0</span><span title="Description" class="glyphicon glyphicon-tasks" aria-hidden="true"></span><span class="number">0</span><span title="Attachments" class="glyphicon glyphicon-paperclip" aria-hidden="true"></span><span class="number">0</span></div><div class= "item-number pull-right">#<span>'+ data.new_id +'</span></div></div><div class="clearfix"><div class="members-list pull-right clearfix"></div></div></div><p class="start-card" data-target="doing-lists">Start</p></div><div id="card-members-' + data.new_id + '" class="hidden"></div>');
			hideForm($(_self).data('target'));
		}, 'json');
	});

	$(document).on("click",".list-item .item-body",function() {
		var card_id = $(this).closest('.list-item').attr('id').replace(/^card-number-(\d+)$/, '$1');
		$('#members-dropdown').attr('data-card-id', card_id);
		$('#members-dropdown .inputs').html('');
		$('#members-dropdown .inputs').append('<select id="members-select" multiple></select>');
		$('#members-dropdown .inputs select').html($('#all-members').html());
		$('select').val(card_members[card_id]).material_select();

		$('#card-display .members-list.members-dp').html($('#card-members-' + card_id).html());

		$('#card-display').modal('show');
	    var number = $(this).find('.item-number span').html();
	    var title = $(this).find('.item-title').html();

	    $('#card-display .card-number-modal').html('#'+number);
	    $('#card-display .card-title-modal').html(title);
	});		

	$(document).on("click",".start-card",function() {
		var card_id = $(this).closest('.list-item').attr('id').replace(/^card-number-(\d+)$/, '$1');
		var _token = $('meta[name="_token"]').attr('content');

		$.post('/changecolumn', {card_id: card_id, column: 'Doing', _token: _token}, function(data){}, 'json');

		var html = $(this).parent().find('.item-body').html();
		var target = $(this).data('target');
		$(this).parent().remove();
		$('#'+target).append('<div id="card-number-' + card_id + '" class="list-item clearfix"><div class="item-body">'+html+'</div><p class="status-card"><span class="pause pull-left double-status" data-target="todo-lists">Pause</span><span class="timer">00:00:00</span><span class="done pull-right double-status" data-target="done-lists">Done</span></p></div>');
	});	

	$(document).on("click",".double-status",function() {
	    var html = $(this).parents('.list-item').find('.item-body').html();
	    var target = $(this).data('target');
	    var cardTarget = ''
	    if(target == 'todo-lists') {
	    	cardTarget = '<p class="start-card" data-target="doing-lists">Start</p>';
			var _column = 'Todo';
	    } else {
	    	cardTarget = '<div class="status-holder"><p class="completed pending">Waiting for feedback</p><div class="change-status hidden"><p>Set as Completed</p></div></div>';
			var _column = 'Done';
	    }

		var card_id = $(this).closest('.list-item').attr('id').replace(/^card-number-(\d+)$/, '$1');
		var _token = $('meta[name="_token"]').attr('content');

		$.post('/changecolumn', {card_id: card_id, column: _column, _token: _token}, function(data){}, 'json');

	   	$(this).parents('.list-item').remove();
	    $('#'+target).append('<div id="card-number-' + card_id + '" class="list-item clearfix"><div class="item-body">'+html+'</div>'+cardTarget+'</div>');
	});	

	$(document).on('change','#members-dropdown', function(){
		var _token = $('meta[name="_token"]').attr('content');
		var card_id = $('#members-dropdown').attr('data-card-id');
		var project_id = $('#members-dropdown').attr('data-project-id');
		card_members[card_id] = [];
		$('#members-dropdown .members-list').html('');
		$('#card-members-' + card_id).html('');

		var ids = $('#members-select').val();
		if (ids == null) {
			ids = [];
		} else {
			for (var i = 0; i < ids.length; i++) {
				card_members[card_id].push(ids[i]);
			}
		}

		var users = jQuery(this).find('input').val();
		users = users.split(',');

		for (var i = 0; i < users.length; i++) {
			var names = users[i];
			names = names.split(' ');
			var count = names.length;
			var fname = names[0].charAt(0);
			var lname = names[count - 1].charAt(0);
			if (fname == '') {
				if (undefined != names[1]) {
					fname = names[1].charAt(0);
				}
			}
			if(fname) {
				$('#members-dropdown .members-list').append('<span class="member" title="' + users[i] + '">' + fname + '</span>');
				$('#card-members-' + card_id).append('<span class="member" title="' + users[i] + '">' + fname + '</span>');
			}
		}


		$.post('/changemembers', {card_id: card_id, project_id: project_id, members: ids, _token: _token}, function(data){}, 'json');
	});

	jQuery(document).on('click','.status-holder .pending', function(){
		jQuery(this).parent().find('.change-status').removeClass('hidden');
	});
	jQuery(document).on('click','.status-holder .change-status p', function(){
		jQuery(this).parents('.status-holder').find('.completed.pending').removeClass('pending').html('Completed');
		jQuery(this).parent().addClass('hidden');
	});

	$(document).on("click","#add-comment",function() {
		var msg = $(this).parent().find('textarea').val();
		var user = $(this).parent().find('.members-list').html();

		$(this).parent().find('textarea').val('');
		if(msg!='') {
			$('#card-display .comments-list').append('<div class="comment"><div class="members-list">'+user+'</div><p>'+msg+'</p></div>');
		}
	});

	$(document).ready(function($) {
	    $('select').material_select();
	    $('.caret').html('');
	    $('#datetimepicker1').datetimepicker();
	    $('#card-display').on('shown.bs.modal', function() {
	    	
	    });

	    var timer;
	    timer = new _timer
	    (
	        function(time)
	        {
	            if(time == 0)
	            {
	                timer.stop();
	                alert('time out');
	            }
	        }
	    );
	    timer.reset(0);
	    timer.mode(1);
	});
	function hideForm(id) {
		$('#'+id).addClass('hidden');
		$('#'+id).prev().removeClass('hidden');
	}


</script>